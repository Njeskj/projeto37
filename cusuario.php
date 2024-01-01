<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Inicializar variáveis para armazenar mensagens
$mensagem = '';
$erro = '';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome_usuario = htmlspecialchars($_POST["nome_usuario"]);
    $email = htmlspecialchars($_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Criptografar a senha
    $data_nascimento = $_POST["data_nascimento"];
    $admin = isset($_POST["admin"]) ? 1 : 0; // Se a checkbox estiver marcada, atribui 1, senão, atribui 0

    // Validar dados
    if (empty($nome_usuario) || empty($email) || empty($_POST["senha"]) || empty($data_nascimento)) {
        $erro = "Preencha todos os campos obrigatórios do formulário.";
    } else {
        // Inserir dados no banco de dados
        $query = "INSERT INTO usuarios (nome_usuario, email, senha, data_nascimento, admin) VALUES ('$nome_usuario', '$email', '$senha', '$data_nascimento', $admin)";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            $mensagem = "Usuário cadastrado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar usuário: " . mysqli_error($conexao);
        }
    }
}
?>








<h2>Cadastro de Usuário</h2>

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
        <label for="nome_usuario" class="form-label">Nome do Usuário:</label>
        <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha:</label>
        <input type="password" id="senha" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
    </div>
    <div class="mb-3">
        <input type="checkbox" id="admin" name="admin">
        <label for="admin">Admin</label>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>
</form>