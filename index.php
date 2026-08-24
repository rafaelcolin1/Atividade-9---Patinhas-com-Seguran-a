<?php

include 'infra/connect.php';
$sql = "SELECT * FROM pratos";
$resultado = mysqli_query($conn, $sql);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario'] ?? null;

    if ($usuario_id) {
        $sql = "SELECT * FROM animais WHERE id_usuario = $usuario_id";
        $resultado = mysqli_query($conn, $sql);
    } else {
        $sql = "SELECT * FROM animais";
        $resultado = mysqli_query($conn, $sql);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Animais</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <main>
        <h1>Gerenciador de Animais</h1>
        <a href="public/cad_animal.php"> Novo Animal</a>
        <a href="public/cad_user.php"> Novo Usuário</a>
        <br>
        <br>
        <form method="POST">
            <label for="usuario">Filtro por Usuário</label>
            <select id="usuario" name="usuario">
                <option value="">Todos</option>
                <?php
                $sqlUsuarios = "SELECT * FROM usuarios";
                $resultadoUsuarios = mysqli_query($conn, $sqlUsuarios);
                while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) {
                    echo "<option value='{$usuario['id']}'>{$usuario['nome']}</option>";
                }

                ?>
            </select>
            <button type="submit">Filtrar</button>
            <br>
            <br>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Espécie</th>
                    <th>Raça</th>
                    <th>Porte</th>
                    <th>Idade</th>
                    <th>ID do Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                    while ($animal = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>{$animal['nome']}</td>";
                        echo "<td>{$animal['especie']}</td>";
                        echo "<td>{$animal['raca']}</td>";
                        echo "<td>{$animal['porte']}</td>";
                        echo "<td>{$animal['idade']}</td>";
                        echo "<td>{$animal['id_usuario']}</td>";
                        echo "<td>
                                <a href='public/editar_animal.php?id={$animal['id']}'>Editar</a> |
                                <a href='public/excluir_animal.php?id={$animal['id']}'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </main>


</body>

</html>