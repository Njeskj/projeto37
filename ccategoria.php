<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Inicializar variáveis para armazenar mensagens
$mensagem = '';
$erro = '';

// Processamento do formulário
$nomeCategoria = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação dos campos (adapte conforme necessário)
    $nomeCategoria = $_POST["nome_categoria"];

    // Verifica se o campo nome_categoria não está vazio
    if (empty($nomeCategoria)) {
        echo "<p class='text-danger'>Por favor, preencha o campo Nome da Categoria.</p>";
    } else {
        // Tente inserir na tabela
        $query = "INSERT INTO categorias (nome) VALUES ('$nomeCategoria')";
        $resultado = $conn->query($query);

        if ($resultado) {
            $mensagem = "Categoria cadastrada com sucesso!";
        } else {
            $erro = "Erro ao cadastrar categoria: " . $conn->error;
        }
    }
}
?>

<!-- Formulário de Cadastro de Categoria -->

<h4>Cadastro de Categoria</h4>

<?php
// Exibir mensagens de sucesso ou erro, se houverem
if (!empty($mensagem)) {
    echo "<p class='alert alert-success'>$mensagem</p>";
}
if (!empty($erro)) {
    echo "<p class='alert alert-danger'>$erro</p>";
}
?>

<form method="post" action="cadastro.php?p=ccategoria">
    <div class="mb-3">
        <label for="nome_categoria" class="form-label">Nome da Categoria:</label>
        <input type="text" id="nome_categoria" name="nome_categoria" class="form-control" value="<?php echo htmlspecialchars($nomeCategoria); ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
</form>
