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
$id_categoria = isset($_POST["categoria"]) ? intval($_POST["categoria"]) : 0;
$nome = isset($_POST["nome"]) ? htmlspecialchars($_POST["nome"]) : '';
$descricao = isset($_POST["descricao"]) ? htmlspecialchars($_POST["descricao"]) : '';
$quantidade = isset($_POST["quantidade"]) ? intval($_POST["quantidade"]) : 0;
$valor_compra = isset($_POST["valor_compra"]) ? floatval($_POST["valor_compra"]) : 0.0;
$valor_venda = isset($_POST["valor_venda"]) ? floatval($_POST["valor_venda"]) : 0.0;

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar dados
    if (empty($id_categoria) || empty($nome) || empty($valor_venda)) {
        $erro = "Preencha todos os campos obrigatórios do formulário.";
    } else {
        // Inserir dados no banco de dados
        $query = "INSERT INTO produtos (id_categoria, nome, descricao, quantidade, valor_compra, valor_venda) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);

        // Vincular parâmetros
        mysqli_stmt_bind_param($stmt, 'isssdd', $id_categoria, $nome, $descricao, $quantidade, $valor_compra, $valor_venda);

        // Executar a declaração preparada
        if (mysqli_stmt_execute($stmt)) {
            $mensagem = "Produto cadastrado com sucesso!";
            // Limpar os campos após o cadastro (opcional)
            $_POST = array();
        } else {
            $erro = "Erro ao cadastrar produto: " . mysqli_error($conn);
        }

        // Fechar a declaração preparada
        mysqli_stmt_close($stmt);
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
<form method="post" action="cadastro.php?p=cproduto">
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria:</label>
        <select id="categoria" name="categoria" class="form-control">
            <option value="" disabled selected>Selecione a Categoria</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do Produto" value="<?php echo $nome; ?>">
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea id="descricao" name="descricao" class="form-control" placeholder="Descrição do Produto"><?php echo $descricao; ?></textarea>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" value="<?php echo $quantidade; ?>">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="valor_compra" class="form-label">Valor Compra:</label>
            <input type="text" id="valor_compra" name="valor_compra" class="form-control" value="<?php echo number_format($valor_compra, 2, ',', '.'); ?>">
        </div>
        <div class="col">
            <label for="valor_venda" class="form-label">Valor Venda:</label>
            <input type="text" id="valor_venda" name="valor_venda" class="form-control" value="<?php echo number_format($valor_venda, 2, ',', '.'); ?>">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
</form>