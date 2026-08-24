<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$pet = $_POST["pet"];

$sql = "UPDATE clientes SET nome='$nome', pet='$pet' WHERE id = '$id'";

mysqli_query($conexao, $sql);
header("Location: ../index.php");