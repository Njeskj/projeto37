<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php if (isset($_SESSION['username'])) : ?>
        <!-- Links quando o usuário está autenticado -->
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">Bem-vindo, <?php echo $_SESSION['username']; ?>!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Início</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.php">Painel Administrativo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pedido-1.php">Fazer Pedido</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Sair</a>
                            </li>
                        </ul>
            </div>
        <?php else : ?>
            <!-- Links quando o usuário não está autenticado -->
            <!-- Navbar Principal -->
            <div class="container">
                <a class="navbar-brand" href="index.php">Sistema de Pedidos</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="planos.php">Planos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
</nav>