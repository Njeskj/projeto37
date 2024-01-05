<?php
// Arquivo para obter o valor de venda do produto com base no ID

// Incluir o arquivo de conexão com o banco de dados
require_once('db.php');

// Verificar se o ID do produto foi fornecido via GET
if (isset($_GET['produto_id'])) {
    $produto_id = intval($_GET['produto_id']);

    // Consultar o valor de venda do produto no banco de dados
    $query = "SELECT valor_venda FROM produtos WHERE id = $produto_id";
    $resultado = $conn->query($query);

    if ($resultado) {
        // Verificar se pelo menos uma linha foi retornada
        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $valor_venda = $row['valor_venda'];

            // Retornar o valor de venda como resposta
            echo $valor_venda;
        } else {
            // Produto não encontrado
            echo 'Produto não encontrado';
        }
    } else {
        // Erro na consulta
        echo 'Erro na consulta: ' . $conn->error;
    }
} else {
    // ID do produto não fornecido
    echo 'ID do produto não fornecido';
}

// Fechar a conexão com o banco de dados
$conn->close();
