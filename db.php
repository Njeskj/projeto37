<?php

// Configurações do banco de dados
$host = "localhost";  // Normalmente "localhost" se estiver em ambiente local
$usuario = "root";
$senha = "";
$banco = "projeto37";

// Conexão com o banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conn->connect_error);
}

// Definir o conjunto de caracteres para utf8 (opcional, dependendo das suas necessidades)
$conn->set_charset("utf8");

?>
