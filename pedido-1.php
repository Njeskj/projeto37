<div class="container container-pedido">
    <section>
        <h2>Faça seu Pedido</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Coletar dados do formulário
            $produto = htmlspecialchars($_POST["produto"]);
            $quantidade = htmlspecialchars($_POST["quantidade"]);
            $cliente_nome = htmlspecialchars($_POST["cliente_nome"]);
            $cliente_endereco = htmlspecialchars($_POST["cliente_endereco"]);
            $cliente_comp = htmlspecialchars($_POST["cliente_comp"]);
            $cliente_ref = htmlspecialchars($_POST["cliente_ref"]);
            $cliente_bairro = htmlspecialchars($_POST["cliente_bairro"]);
            $cliente_cep = htmlspecialchars($_POST["cliente_cep"]);
            $cliente_telefone = htmlspecialchars($_POST["cliente_telefone"]);
            $obs_pedido = htmlspecialchars($_POST["obs_pedido"]);
            $pagamento_online = htmlspecialchars($_POST["pagamento_online"]);
            $pagamento_online_valor = htmlspecialchars($_POST["pagamento_online_valor"]);
            $pagamento_cliente = htmlspecialchars($_POST["pagamento_cliente"]);
            $pagamento_cliente_valor = htmlspecialchars($_POST["pagamento_cliente_valor"]);

            // Validar dados (pode adicionar validações mais robustas)
            if (empty($produto) || empty($quantidade) || empty($cliente_nome) || empty($cliente_endereco) || empty($cliente_telefone)) {
                echo "<p style='color: red;'>Preencha todos os campos do formulário.</p>";
            } else {
                // Redirecionar para a página de cupom com os dados do pedido
                header(
                    "Location: cupom.php?" .
                        "produto=" . urlencode($produto) .
                        "&quantidade=" . urlencode($quantidade) .
                        "&cliente_nome=" . urlencode($cliente_nome) .
                        "&cliente_endereco=" . urlencode($cliente_endereco) .
                        "&cliente_comp=" . urlencode($cliente_comp) .
                        "&cliente_ref=" . urlencode($cliente_ref) .
                        "&cliente_bairro=" . urlencode($cliente_bairro) .
                        "&cliente_cep=" . urlencode($cliente_cep) .
                        "&cliente_telefone=" . urlencode($cliente_telefone) .
                        "&obs_pedido=" . urlencode($obs_pedido) .
                        "&pagamento_online=" . urlencode($pagamento_online) .
                        "&pagamento_online_valor=" . urlencode($pagamento_online_valor) .
                        "&pagamento_cliente=" . urlencode($pagamento_cliente) .
                        "&pagamento_cliente_valor=" . urlencode($pagamento_cliente_valor)
                );
                exit();
            }
        }
        ?>

        <!-- Formulário de Pedido usando classes do Bootstrap -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="produto" class="form-label">Produto:</label>
                <input type="text" id="produto" name="produto" class="form-control" required>
                <div class="invalid-feedback">Por favor, preencha este campo.</div>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" required>
                <div class="invalid-feedback">Por favor, preencha este campo.</div>
            </div>
            <div class="mb-3">
                <h2>Entrega</h2>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cliente_nome">Nome do Cliente:</label><br>
                <input class="form-control" type="text" id="cliente_nome" name="cliente_nome" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cliente_endereco">Endereço:</label><br>
                <input class="form-control" type="text" id="cliente_endereco" name="cliente_endereco" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cliente_comp">Complemento:</label><br>
                <input class="form-control" type="text" id="cliente_comp" name="cliente_comp"><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cliente_ref">Referência:</label><br>
                <input class="form-control" type="text" id="cliente_ref" name="cliente_ref"><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cliente_bairro">Bairro:</label><br>
                <input class="form-control" type="text" id="cliente_bairro" name="cliente_bairro" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cliente_cep">CEP:</label><br>
                <input class="form-control" type="text" id="cliente_cep" name="cliente_cep" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cliente_telefone">Telefone:</label><br>
                <input class="form-control" type="tel" id="cliente_telefone" name="cliente_telefone" required><br><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="obs_pedido">Observações do Pedido:</label><br>
                <textarea class="form-control" id="obs_pedido" name="obs_pedido"></textarea><br>
            </div>
            <div class="mb-3">
                <h2>Formas de Pagamento</h2>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pagamento_online">Pagamento Online:</label><br>
                <select id="pagamento_online" name="pagamento_online">
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pagamento_online_valor">Valor Pagamento Online:</label><br>
                <input class="form-control" type="text" id="pagamento_online_valor" name="pagamento_online_valor"><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pagamento_cliente">Cobrar Cliente:</label><br>
                <select id="pagamento_cliente" name="pagamento_cliente">
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="pagamento_cliente_valor">Valor Cobrar Cliente:</label><br>
                <input class="form-control" type="text" id="pagamento_cliente_valor" name="pagamento_cliente_valor"><br><br>
            </div>
            <div class="mb-3">
                <input type="submit" value="Concluir Pedido" class="btn btn-primary">
            </div>
        </form>
    </section>
</div>