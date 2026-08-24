<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$pet = $_POST["pet"];

$sql = "INSERT INTO clientes (nome, pet) VALUES ('$nome','$pet')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");
?>