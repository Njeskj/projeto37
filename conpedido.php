<?php
// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Consultar dados da tabela 'pedidos'
$query = "SELECT * FROM pedidos";
$resultado = mysqli_query($conexao, $query);

// Verificar se há erros na consulta
if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}
?>




<h2>Consulta de Pedidos</h2>

<!-- Tabela para exibir os resultados da consulta -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Total</th>
            <!-- Adicione mais colunas conforme necessário -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Exibir os resultados da consulta
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<th scope='row'>" . $row['id'] . "</th>";
            echo "<td>" . $row['cliente_nome'] . "</td>";
            echo "<td>" . $row['produto'] . "</td>";
            echo "<td>" . $row['quantidade'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            // Adicione mais colunas conforme necessário
            echo "</tr>";
        }
        ?>
    </tbody>
</table>