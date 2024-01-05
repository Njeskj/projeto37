<?php
// Inclua o arquivo de conexão com o banco de dados
require_once('db.php');

// Consultar adicionais no banco de dados
$sqlBairros = "SELECT id, nome, valor FROM bairros";
$resultBairros = $conn->query($sqlBairros);

// Verificar se o formulário da etapa 2 foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["etapa"]) && $_POST["etapa"] == 2) {
    // Processar dados da etapa 2
    // Implemente aqui a lógica para lidar com os dados do usuário
}

// Incluir o cabeçalho e qualquer outro conteúdo comum às páginas
?>

<!-- Conteúdo específico da Etapa 2 -->
<h2>Informações do Cliente</h2>

<form method="post" action="pedido.php?p=pedido-3">
    <!-- Adicione campos de formulário para os dados do usuário -->
    <div class="mb-3">
        <label for="categoria" class="form-label">Tefeone:</label>
        <input type="tel" id="nome" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Endereço:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
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
        <label class="form-label">Bairro:</label>
        <select id="categoria" name="categoria" class="form-select" required>
            <option value="" disabled selected>Escolha o Bairro</option>
            <?php
            while ($rowBairros = $resultBairros->fetch_assoc()) {
                echo '<option value="' . $rowBairros['id'] . '">' . $rowBairros['nome'] .  ' R$' . $rowBairros['valor'] . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">CEP:</label>
        <input type="number" id="nome" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Data de Nascimento:</label>
        <input type="date" id="nome" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">CPF:</label>
        <input type="number" id="nome" name="nome" class="form-control" required>
    </div>

    <!-- Botão para finalizar o pagamento ou avançar para a próxima etapa -->
    <button type="submit" class="btn btn-primary">Finalizar Pagamento</button>
</form>

<?php
// Fechar a conexão com o banco de dados
$conn->close();

// Incluir o rodapé e qualquer outro conteúdo comum às páginas
?>