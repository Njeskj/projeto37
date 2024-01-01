<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Inicializar variáveis para armazenar mensagens
$mensagem = '';
$erro = '';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome_empresa = htmlspecialchars($_POST["nome_empresa"]);
    $cnpj = htmlspecialchars($_POST["cnpj"]);
    $endereco = htmlspecialchars($_POST["endereco"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $email = htmlspecialchars($_POST["email"]);

    // Validar dados
    if (empty($nome_empresa) || empty($cnpj) || empty($endereco) || empty($telefone) || empty($email)) {
        $erro = "Preencha todos os campos obrigatórios.";
    } else {
        // Inserir dados no banco de dados
        $query = "INSERT INTO empresas (nome_empresa, cnpj, endereco, telefone, email) VALUES ('$nome_empresa', '$cnpj', '$endereco', '$telefone', '$email')";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            $mensagem = "Empresa cadastrada com sucesso!";
        } else {
            $erro = "Erro ao cadastrar empresa: " . mysqli_error($conexao);
        }
    }
}
?>








<h4>Cadastro de Empresa</h4>

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
        <label for="nome_empresa" class="form-label">Nome da Empresa:</label>
        <input type="text" id="nome_empresa" name="nome_empresa" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="cnpj" class="form-label">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="text" id="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Cadastrar Empresa</button>
    </div>
</form>