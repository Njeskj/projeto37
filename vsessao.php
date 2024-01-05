<?php
// Iniciar a sessão
session_start();

// Verificar se a sessão está ativa
if (!isset($_SESSION['id'])) {
    // Se a sessão não estiver ativa, redirecionar para a página de login
    header("Location: login.php");
    exit();
}
?>
