<?php
// Inclua o arquivo de conexão com o banco de dados
require_once('db.php');

// Consultar adicionais no banco de dados
$sqlBairros = "SELECT id, nome, valor FROM bairros";
$resultBairros = $conn->query($sqlBairros);

// Variável para armazenar mensagens de erro
$erros = [];

// Verificar se o formulário da etapa 2 foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["etapa"]) && $_POST["etapa"] == 2) {
    // Processar dados da etapa 2
    // Implemente aqui a lógica para lidar com os dados do usuário

    // Validar campo de telefone
    if (empty($_POST['telefone'])) {
        $erros[] = 'Por favor, insira um número de telefone.';
    } elseif (!preg_match('/^[0-9]{10,15}$/', $_POST['telefone'])) {
        $erros[] = 'Formato de telefone inválido. Insira apenas números (10 a 15 dígitos).';
    }

    // Validar campo de nome
    if (empty($_POST['nome'])) {
        $erros[] = 'Por favor, insira seu nome.';
    }

    // Validar campo de endereço
    if (empty($_POST['endereco'])) {
        $erros[] = 'Por favor, insira seu endereço.';
    }

    // Validar campo de bairro
    if (empty($_POST['bairro'])) {
        $erros[] = 'Por favor, escolha um bairro.';
    }

    // Validar campo de CEP
    // if (empty($_POST['cep'])) {
    //     $erros[] = 'Por favor, insira seu CEP.';
    // } elseif (!preg_match('/^\d{8}$/', $_POST['cep'])) {
    //     $erros[] = 'Formato de CEP inválido. Insira 8 dígitos numéricos.';
    // }

    // Validar campo de data de nascimento
    // if (empty($_POST['data_nascimento'])) {
    //     $erros[] = 'Por favor, insira sua data de nascimento.';
    // }

    // Validar campo de CPF
    // if (empty($_POST['cpf'])) {
    //     $erros[] = 'Por favor, insira seu CPF.';
    // } elseif (!preg_match('/^\d{11}$/', $_POST['cpf'])) {
    //     $erros[] = 'Formato de CPF inválido. Insira 11 dígitos numéricos.';
    // }

    // Se não houver erros, prossiga com o processamento
    if (empty($erros)) {
        // Lógica de processamento dos dados

        // Após o processamento, você pode redirecionar o usuário ou exibir uma mensagem de sucesso
        // Exemplo:
        // header('Location: confirmacao.php');
        // exit;
    }
}

// Fechar a conexão com o banco de dados
// $conn->close();
?>

<!-- Conteúdo específico da Etapa 2 -->
<h2>Informações do Cliente</h2>

<!-- Exibir mensagens de erro, se houver -->
<?php
if (!empty($erros)) {
    echo '<div class="alert alert-danger" role="alert">';
    foreach ($erros as $erro) {
        echo $erro . '<br>';
    }
    echo '</div>';
}
?>

<form method="post" action="pedido.php?p=pedido-3">
    <!-- Adicione campos de formulário para os dados do usuário -->
    <input type="hidden" name="etapa" value="2">

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" class="form-control" required>
        <div class="invalid-feedback">Por favor, insira um número de telefone.</div>
    </div>

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
        <div class="invalid-feedback">Por favor, insira seu nome.</div>
    </div>

    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço:</label>
        <input type="text" id="endereco" name="endereco" class="form-control" required>
        <div class="invalid-feedback">Por favor, insira seu endereço.</div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="comp" class="form-label">Comp:</label>
            <input type="text" class="form-control" id="comp">
        </div>
        <div class="form-group">
            <label for="ref" class="form-label">Ref:</label>
            <input type="text" class="form-control" id="ref">
        </div>
    </div>

    <div class="mb-3">
        <label for="bairro" class="form-label">Bairro:</label>
        <select id="bairro" name="bairro" class="form-select" required>
            <option value="" disabled selected>Escolha o Bairro</option>
            <?php
            while ($rowBairros = $resultBairros->fetch_assoc()) {
                echo '<option value="' . $rowBairros['id'] . '">' . $rowBairros['nome'] . ' R$' . $rowBairros['valor'] . '</option>';
            }
            ?>
        </select>
        <div class="invalid-feedback">Por favor, selecione o bairro.</div>
    </div>

    <div class="mb-3">
        <label for="cep" class="form-label">CEP:</label>
        <input type="number" id="cep" name="cep" class="form-control">
    </div>

    <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" class="form-control">
    </div>
    
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="number" id="cpf" name="cpf" class="form-control">
    </div>

    <!-- Botão para finalizar o pagamento ou avançar para a próxima etapa -->
    <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
</form>