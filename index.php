<?php

include "infra/conexao.php";
$livros = mysqli_query($conexao, "SELECT * FROM livros");

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
        <h2>Adicione um novo cliente!</h2>
        <form action="public/cadastrar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="pet">Pet:</label>
            <input type="text" name="pet">
            <br>
            <button type="submit">Cadastrar</button>
        </form>
        <div>
            <h2>Clientes Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Pet</th>
                    <th>Ações</th>
                </tr>
                <?php while ($cliente = mysqli_fetch_assoc($clientes)) { ?>
                    <tr>
                        <td><?php echo $cliente["id"] ?></td>
                        <td><?php echo $cliente["nome"] ?></td>
                        <td><?php echo $cliente["pet"] ?></td>
                        <td>
                            <a href="public/editar.php?id=<?php echo $cliente["id"] ?>">Editar</a>
                            <a href="public/excluir.php?id=<?php echo $cliente["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </main>
    <footer>

    </footer>


</body>

</html>