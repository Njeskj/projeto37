<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Inicializar variáveis para armazenar mensagens
$mensagem = '';
$erro = '';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome_produto = htmlspecialchars($_POST["nome_produto"]);
    $descricao = htmlspecialchars($_POST["descricao"]);
    $quantidade = intval($_POST["quantidade"]); // Converter para inteiro
    $preco = floatval($_POST["preco"]); // Converter para float

    // Validar dados
    if (empty($nome_produto) || empty($preco)) {
        $erro = "Preencha todos os campos obrigatórios do formulário.";
    } else {
        // Inserir dados no banco de dados
        $query = "INSERT INTO produtos (nome_produto, descricao, preco) VALUES ('$nome_produto', '$descricao', $preco)";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            $mensagem = "Produto cadastrado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar produto: " . mysqli_error($conexao);
        }
    }
}
?>





<h2>Cadastro de Produto</h2>

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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="mb-3">
        <label for="nome_produto" class="form-label">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea id="descricao" name="descricao" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" required>
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço:</label>
        <input type="text" id="preco" name="preco" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
</form>