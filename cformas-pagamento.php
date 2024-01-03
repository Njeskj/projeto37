<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Inicializar variáveis para armazenar mensagens
$mensagem = '';
$erro = '';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome_forma_pagamento = htmlspecialchars($_POST["nome_forma_pagamento"]);

    // Validar dados
    if (empty($nome_forma_pagamento)) {
        $erro = "Preencha todos os campos obrigatórios do formulário.";
    } else {
        // Inserir dados no banco de dados
        $query = "INSERT INTO formas_de_pagamento (nome) VALUES ('$nome_forma_pagamento')";
        $resultado = $conn->query($query);

        if ($resultado) {
            $mensagem = "Forma de pagamento cadastrada com sucesso!";
        } else {
            $erro = "Erro ao cadastrar forma de pagamento: " . $conn->error;
        }
    }
}
?>

<h4>Cadastro de Forma de Pagamento</h3>

    <?php
    // Exibir mensagens de sucesso ou erro, se houverem
    if (!empty($mensagem)) {
        echo "<p class='alert alert-success'>$mensagem</p>";
    }
    if (!empty($erro)) {
        echo "<p class='alert alert-danger'>$erro</p>";
    }
    ?>

    <!-- Formulário de cadastro usando classes do Bootstrap -->
    <form method="post" action="cadastro.php?p=cformas-pagamento">
        <div class="mb-3">
            <label for="nome_forma_pagamento" class="form-label">Nome da Forma de Pagamento:</label>
            <input type="text" id="nome_forma_pagamento" name="nome_forma_pagamento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Forma de Pagamento</button>
    </form>