<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents("sql/projeto37.sql");
    $conn->exec($sql);

    echo "Banco de Dados e Tabelas criados/atualizados!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
