<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM clientes WHERE id = $id";
$resultado = mysqli_query($conexao, $sql );

$cliente =mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet - AUmigos</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>Pet - AUmigos</h1>
    </header>
    <main>
        <h2>Editando o cliente <?php echo $cliente["nome"]?>!</h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cliente["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $cliente["nome"]?>">
            <br>
            <label for="pet">Pet:</label>
            <input type="text" name="pet" value="<?php echo $cliente["pet"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>