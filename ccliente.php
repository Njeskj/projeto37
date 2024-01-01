<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Inicializar variáveis para armazenar mensagens
$mensagem = '';
$erro = '';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome_cliente = htmlspecialchars($_POST["nome"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $endereco = htmlspecialchars($_POST["endereco"]);
    $comp = htmlspecialchars($_POST["comp"]);
    $ref = htmlspecialchars($_POST["ref"]);
    $bairro = htmlspecialchars($_POST["bairro"]);
    $cep = htmlspecialchars($_POST["cep"]);

    // Validar dados
    if (empty($nome_cliente) || empty($endereco) || empty($bairro) || empty($cep) || empty($telefone)) {
        $erro = "Preencha todos os campos obrigatórios do formulário.";
    } else {
        // Inserir dados no banco de dados
        $query = "INSERT INTO clientes (nome, telefone, endereco, comp, ref, bairro, cep) VALUES ('$nome_cliente', '$endereco', '$comp', '$ref', '$bairro', '$cep', '$telefone')";
        $resultado = $conn->query($query);

        if ($resultado) {
            $mensagem = "Cliente cadastrado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar cliente: " . $conn->error;
        }
    }
}
?>

<h4>Cadastro de Cliente</h4>

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
<form method="post" action="cadastro.php?p=ccliente">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Cliente:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="comp" class="form-label">Complemento:</label>
        <input type="text" id="comp" name="comp" class="form-control">
    </div>
    <div class="mb-3">
        <label for="ref" class="form-label">Referência:</label>
        <input type="text" id="ref" name="ref" class="form-control">
    </div>
    <div class="mb-3">
        <label for="bairro" class="form-label">Bairro:</label>
        <input type="text" id="bairro" name="bairro" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="cep" class="form-label">CEP:</label>
        <input type="text" id="cep" name="cep" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
</form>
