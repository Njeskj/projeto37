<?php
// Inicie a sessão e verifique se o usuário está autenticado
// session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Conecte-se ao banco de dados (substitua pelos seus dados)
require_once('db.php');

// Consulta SQL para obter a lista de pedidos (substitua pelos seus dados)
$sql = "SELECT * FROM pedidos";
$result = $conn->query($sql);

// Feche a conexão com o banco de dados
$conn->close();
?>




<div class="container mt-5">
    <h2>Consulta de Pedidos</h2>

    <?php if ($result->num_rows > 0) : ?>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Data do Pedido</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['cliente']; ?></td>
                        <td><?php echo $row['data_pedido']; ?></td>
                        <td>R$ <?php echo number_format($row['total'], 2, ',', '.'); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Nenhum pedido encontrado.</p>
    <?php endif; ?>

    <a href="dashboard.php" class="btn btn-primary mt-3">Voltar para o Painel</a>
</div>