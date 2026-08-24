<?php

    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "pet_aumigos_rafael_colin_m1";
    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

mysqli_set_charset($conn, "utf8mb4");
?>