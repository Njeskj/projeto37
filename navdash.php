<?php
include "db.php";

// Verificar se a conexão está ativa
$statusConexao = $conn->ping();

// Exibir o status
if ($statusConexao) {
    $status = "Online";
    $cor = "green";
} else {
    $status = "Offline";
    $cor = "red";
}
?>


<style>
    .brilhante {
        animation: brilhar 0.5s infinite alternate;
    }

    @keyframes brilhar {
        0% {
            box-shadow: 0 0 5px 0px <?php echo $cor; ?>;
        }

        100% {
            box-shadow: 0 0 10px 2px <?php echo $cor; ?>;
        }
    }
</style>


<!-- Navbar Dashboard -->
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <div class="container">

        <!-- Status da Conexão com o Banco de Dados -->
        <button type="button" class="btn shadow p-1 mb-1 bg-white rounded">
            <div class="d-flex align-items-center">
                <div class="brilhante me-2" style="width: 10px; height: 10px; border-radius: 5px; background-color: <?php echo $cor; ?>;"></div>
                <div class="fw-bold"><?php echo $status; ?></div>
            </div>
        </button>



        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">



                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastro</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastro.php?p=ccategoria">Categoria</a></li>
                        <li><a class="dropdown-item" href="cadastro.php?p=ccliente">Cliente</a></li>
                        <li><a class="dropdown-item" href="cadastro.php?p=cempresa">Empresa</a></li>
                        <li><a class="dropdown-item" href="cadastro.php?p=cformas-pagamento">Formas de Pagamento</a></li>
                        <li><a class="dropdown-item" href="cadastro.php?p=cproduto">Produto</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="cadastro.php?p=cusuario">Usuário</a></li>
                    </ul>
                </li>




                <li class="nav-item">
                    <a class="nav-link" href="consulta.php?p=conpedido">Pedidos</a>
                </li>




                <li class="nav-item">
                    <a class="nav-link" href="#">Relatórios</a>
                </li>



            </ul>
        </div>
    </div>
</nav>