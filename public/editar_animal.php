<?php

include '../infra/connect.php';
if (!isset($conn) || $conn === null) {
    die('Erro ao conectar com o banco de dados.');
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$sql = "SELECT * FROM animais WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$resultadoAnimal = mysqli_stmt_get_result($stmt);
$animal = mysqli_fetch_assoc($resultadoAnimal);

if (!$animal) {
    die('Animal não encontrado.');
}

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conn, $sql);

if ($resultado === false) {
    die('Erro ao consultar usuários: ' . mysqli_error($conn));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $especie = trim($_POST['especie']);
    $raca = trim($_POST['raca']);
    $porte = trim($_POST['porte']);
    $idade = (int) $_POST['idade'];
    $usuario_id = (int) $_POST['usuario'];

    $sql = "UPDATE animais SET nome = ?, especie = ?, raca = ?, porte = ?, idade = ?, id_usuario = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssdsi', $nome, $especie, $raca, $porte, $idade, $usuario_id, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Animal atualizado com sucesso!";
        echo "<br><a href='../index.php'>Voltar</a>";
        exit();
    } else {
        echo "Erro ao atualizar animal: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($animal['nome']); ?>" required>
        <label for="especie">Espécie:</label>
        <input type="text" name="especie" id="especie" value="<?php echo htmlspecialchars($animal['especie']); ?>" required>
        <label for="raca">Raça:</label>
        <input type="text" name="raca" id="raca" value="<?php echo htmlspecialchars($animal['raca']); ?>" required>
        <label for="porte">Porte:</label>
        <input type="text" name="porte" id="porte" value="<?php echo htmlspecialchars($animal['porte']); ?>" required>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" value="<?php echo htmlspecialchars($animal['idade']); ?>" required>
        <label for="usuario">Usuário:</label>
        <select name="usuario" id="usuario" required>
            <option value="">Selecione um usuário</option>
            <?php
            while ($row = mysqli_fetch_assoc($resultado)) {
                $selected = ($row['id'] == $animal['id_usuario']) ? 'selected' : '';
                echo "<option value='{$row['id']}' {$selected}>{$row['nome']}</option>";
            }
            ?>
        </select>
        <button type="submit">Atualizar Animal</button>
    </form>
    <button type="button" onclick="window.location.href='../index.php'">Voltar</button>

</body>

</html>