<?php
// // Certifique-se de ter as configurações corretas de conexão ao banco de dados
// $servername = "seu_servidor_mysql";
// $username = "seu_usuario_mysql";
// $password = "sua_senha_mysql";
// $dbname = "seu_banco_de_dados";

// // Criar a conexão com o banco de dados
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Verificar a conexão
// if ($conn->connect_error) {
//     die("Falha na conexão: " . $conn->connect_error);
// }

// Inicializar variáveis de mensagem
$mensagem = "";
$erro = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];

    // Inserir dados no banco de dados
    $sql = "INSERT INTO adicionais (nome, valor) VALUES ('$nome', '$valor')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        $erro = "Erro ao cadastrar: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Adicionais</title>
    <!-- Adicione aqui seus links para folhas de estilo ou scripts JavaScript, se necessário -->
</head>

<body>
    <h4>Cadastro de Adicionais</h4>

    <?php
    // Exibir mensagens de sucesso ou erro, se houverem
    if (!empty($mensagem)) {
        echo "<p class='alert alert-success'>$mensagem</p>";
    }
    if (!empty($erro)) {
        echo "<p class='alert alert-danger'>$erro</p>";
    }
    ?>

    <form action="cadastro.php?p=cadicionais" method="post">

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="text" name="valor" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    <!-- Adicione aqui outros elementos HTML, scripts ou estilos conforme necessário -->
</body>

</html>