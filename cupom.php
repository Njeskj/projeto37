<?php
// Incrementa o contador de pedido usando cookies
$contadorPedido = isset($_COOKIE['contador_pedido']) ? (int)$_COOKIE['contador_pedido'] + 1 : 1;
setcookie('contador_pedido', $contadorPedido, time() + (86400 * 30), "/"); // Cookie válido por 30 dias
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupom de Pedido</title>
    <style>
        /* Estilos para o cupom */
        body {
            font-family: Arial, sans-serif;
        }

        .cupom {
            width: 300px;
            margin: 20px auto;
            border: 1px solid #000;
            border-style: dotted;
            padding: 10px;
        }

        .cupom h2,
        .cupom p {
            margin: 5px 0;
        }
        .cupom h2, .cupom h3 {
            text-align: center;
            text-transform: uppercase;
        }

        .cupom hr {
            margin: 10px 0;
            border: none;
            border-top: 1px solid #000;
            border-style: dotted;
        }
    </style>
</head>

<body>

    <div class="cupom">

        <h2>*** Pedido #<?php echo $contadorPedido; ?> ***</h2>
        <h3>Restaurante XYZ</h3>
        <p>Data do Pedido: <?php date_default_timezone_set('America/Fortaleza'); echo date("d/m/Y H:i:s"); ?></p>
        <p>Rua Teste, 123 - Cidade Teste</p>
        <p>Telefone: (12) 3456-7890</p>
        
        <p>Telefone Cliente: <?php echo isset($_GET['cliente_telefone']) ? htmlspecialchars($_GET['cliente_telefone']) : ''; ?></p>
        <hr>

        <h3>Itens do Pedido</h3>
        <p><?php echo isset($_GET['quantidade']) ? htmlspecialchars($_GET['quantidade']) : ''; ?> x <?php echo isset($_GET['produto']) ? htmlspecialchars($_GET['produto']) : ''; ?> x <?php echo isset($_GET['produto_valor']) ? htmlspecialchars($_GET['produto_valor']) : ''; ?></p>
        <p>Obs: <?php echo isset($_GET['obs_pedido']) ? htmlspecialchars($_GET['obs_pedido']) : ''; ?></p>
        <!-- ADICIONAR MAIS ITENS AQUI CASO SEJA FEITO -->
        <hr>
        
        <h3>Formas de Pagamento</h3>
        <p>Pagamento Online: <?php echo isset($_GET['pagamento_online']) ? htmlspecialchars($_GET['pagamento_online']) : ''; ?> <?php echo isset($_GET['pagamento_online_valor']) ? htmlspecialchars($_GET['pagamento_online_valor']) : ''; ?></p>
        <p>Cobrar Cliente: <?php echo isset($_GET['pagamento_cliente']) ? htmlspecialchars($_GET['pagamento_cliente']) : ''; ?> <?php echo isset($_GET['pagamento_cliente_valor']) ? htmlspecialchars($_GET['pagamento_cliente_valor']) : ''; ?></p>
        <p>Obs: <?php echo isset($_GET['obs_pedido']) ? htmlspecialchars($_GET['obs_pedido']) : ''; ?></p>
        <!-- ADICIONAR MAIS ITENS AQUI CASO SEJA FEITO -->
        <hr>

        <h3>Total</h3>
        <p>Valor Total dos Itens:</p>
        <p>Taxa de Entrega:</p>
        <p>Taxa Adicional:</p>
        <p>Desconto:</p>
        <p>Valor Total</p>
        <hr>

        <h3>Entrega Pedido #<?php echo $contadorPedido; ?></h3>
        <p></p>
        <p>Cliente: <?php echo isset($_GET['cliente_nome']) ? htmlspecialchars($_GET['cliente_nome']) : ''; ?></p>
        <p>Telefone: <?php echo isset($_GET['cliente_telefone']) ? htmlspecialchars($_GET['cliente_telefone']) : ''; ?></p>
        <p>Endereço: <?php echo isset($_GET['cliente_endereco']) ? htmlspecialchars($_GET['cliente_endereco']) : ''; ?></p>
        <p>Comp: <?php echo isset($_GET['cliente_comp']) ? htmlspecialchars($_GET['cliente_comp']) : ''; ?></p>
        <p>Ref: <?php echo isset($_GET['cliente_ref']) ? htmlspecialchars($_GET['cliente_ref']) : ''; ?></p>
        <p>Bairro: <?php echo isset($_GET['cliente_bairro']) ? htmlspecialchars($_GET['cliente_bairro']) : ''; ?></p>
        <p>CEP: <?php echo isset($_GET['cliente_cep']) ? htmlspecialchars($_GET['cliente_cep']) : ''; ?></p>
        <hr>
        
        <p>Impresso por Sistema (v1.0)</p>
    </div>

    <script>
        // Solicita automaticamente a impressão quando a página carrega
        window.onload = function() {
            window.print();
        // Redireciona para a página index.php após a impressão
        setTimeout(function () {
                window.location.href = 'index.php';
            }, 1000); // Redireciona após 1 segundo (ajuste conforme necessário)
        }
    </script>

</body>

</html>