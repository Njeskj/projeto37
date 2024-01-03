<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Inicializar variáveis para armazenar mensagens
$mensagem = '';
$erro = '';

// Consultar categorias no banco de dados
$query_categorias = "SELECT id, nome FROM categorias";
$resultado_categorias = mysqli_query($conn, $query_categorias);
$categorias = mysqli_fetch_all($resultado_categorias, MYSQLI_ASSOC);

// Coletar dados do formulário
$categoria_id = isset($_POST["categoria"]) ? intval($_POST["categoria"]) : 0;
$nome_produto = isset($_POST["nome_produto"]) ? htmlspecialchars($_POST["nome_produto"]) : '';
$descricao = isset($_POST["descricao"]) ? htmlspecialchars($_POST["descricao"]) : '';
$quantidade = isset($_POST["quantidade"]) ? intval($_POST["quantidade"]) : 0;
$preco = isset($_POST["preco"]) ? floatval($_POST["preco"]) : 0.0;

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar dados
    if (empty($categoria_id) || empty($nome_produto) || empty($preco)) {
        $erro = "Preencha todos os campos obrigatórios do formulário.";
    } else {
        // Inserir dados no banco de dados
        $query = "INSERT INTO produtos (categoria_id, nome, descricao, quantidade, preco) VALUES ($categoria_id, '$nome_produto', '$descricao', $quantidade, $preco)";
        $resultado = mysqli_query($conn, $query);

        if ($resultado) {
            $mensagem = "Produto cadastrado com sucesso!";
            // Limpar os campos após o cadastro (opcional)
            $_POST = array();
        } else {
            $erro = "Erro ao cadastrar produto: " . mysqli_error($conn);
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
        <label for="categoria" class="form-label">Categoria:</label>
        <select id="categoria" name="categoria" class="form-control" required>
            <option value="" disabled selected>Selecione a Categoria</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="nome_produto" class="form-label">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" class="form-control" value="<?php echo $nome_produto; ?>" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea id="descricao" name="descricao" class="form-control"><?php echo $descricao; ?></textarea>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" value="<?php echo $quantidade; ?>" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="valor_compra" class="form-label">Valor Compra:</label>
            <input type="text" id="valor_compra" name="valor_compra" class="form-control" value="<?php echo isset($_POST["valor_compra"]) ? $_POST["valor_compra"] : ''; ?>" required>
        </div>
        <div class="col">
            <label for="preco" class="form-label">Valor Venda:</label>
            <input type="text" id="preco" name="preco" class="form-control" value="<?php echo $preco; ?>" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
</form>