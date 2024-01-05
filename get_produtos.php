<?php
include('db.php');

if (isset($_GET['categoria_id'])) {
    $categoria_id = $_GET['categoria_id'];

    $sqlProdutos = "SELECT id, nome FROM produtos WHERE id_categoria = $categoria_id";
    $resultProdutos = $conn->query($sqlProdutos);

    $produtos = $resultProdutos->fetch_all(MYSQLI_ASSOC);

    echo json_encode($produtos);
} else {
    echo json_encode(['error' => 'Categoria não especificada']);
}
?>
