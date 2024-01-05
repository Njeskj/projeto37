<!-- Navbar Dashboard -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <a href="pedido.php?p=pedido-1">Fazer Pedido</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastro</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cadastro.php?p=cadicionais">Adicionais</a></li>
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

<!-- Importe o Bootstrap JS no final do corpo do HTML, se ainda não estiver sendo importado -->
<script src="js/bootstrap.bundle.min.js"></script>