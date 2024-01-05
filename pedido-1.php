<?php
// Inclua o arquivo de conexão com o banco de dados
require_once('db.php');

// Consultar categorias no banco de dados
$sqlCategorias = "SELECT id, nome FROM categorias";
$resultCategorias = $conn->query($sqlCategorias);

// Consultar produtos no banco de dados
$sqlProdutos = "SELECT id, nome, id_categoria FROM produtos";
$resultProdutos = $conn->query($sqlProdutos);

// Consultar adicionais no banco de dados
$sqlAdicionais = "SELECT id, nome, valor FROM adicionais";
$resultAdicionais = $conn->query($sqlAdicionais);

// Fechar a conexão com o banco de dados
$conn->close();
?>

<!-- Formulário de Etapa 1 com Bootstrap 5 -->
<h2>Pedido</h2>
<form method="post" action="pedido.php?p=pedido-2" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="categoria" class="form-label">Selecione a Categoria:</label>
        <select id="categoria" name="categoria" class="form-select" required>
            <option value="" disabled selected>Escolha uma Categoria</option>
            <?php
            while ($rowCategoria = $resultCategorias->fetch_assoc()) {
                echo '<option value="' . $rowCategoria['id'] . '">' . $rowCategoria['nome'] . '</option>';
            }
            ?>
        </select>
        <div class="invalid-feedback">Por favor, selecione uma categoria.</div>
    </div>

    <div class="mb-3">
        <label for="produto" class="form-label">Selecione o Produto:</label>
        <select id="produto" name="produto" class="form-select" required>
            <option value="" disabled selected>Escolha um Produto</option>
            <?php
            while ($rowProduto = $resultProdutos->fetch_assoc()) {
                echo '<option value="' . $rowProduto['id'] . '" data-categoria="' . $rowProduto['id_categoria'] . '">' . $rowProduto['nome'] . '</option>';
            }
            ?>
        </select>
        <div class="invalid-feedback">Por favor, selecione um produto.</div>
    </div>

    <div class="mb-3">
        <label class="form-label">Adicionais:</label>
        <?php
        while ($rowAdicional = $resultAdicionais->fetch_assoc()) {
            echo '<div class="form-check">';
            echo '<input class="form-check-input" type="checkbox" name="adicionais[]" value="' . $rowAdicional['id'] . '">';
            echo '<label class="form-check-label">' . $rowAdicional['nome'] . ' (R$ ' . number_format($rowAdicional['valor'], 2, ',', '.') . ')</label>';
            echo '</div>';
        }
        ?>
    </div>

    <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
</form>

<!-- Adicione o script JavaScript para validação no lado do cliente -->
<script>
    // Habilitar a validação do formulário Bootstrap
    (function() {
        'use strict';

        var forms = document.querySelectorAll('.needs-validation');

        Array.from(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>