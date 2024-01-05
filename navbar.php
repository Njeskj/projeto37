<?php
// Iniciar a sessão se ainda não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Título à Esquerda -->
        <a class="navbar-brand" href="#">Sistema de Pedidos</a>

        <!-- Botão para dispositivos pequenos -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Itens da navegação à Direita -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo isset($_SESSION['id']) ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Início</a>
                </li>
                <?php if (isset($_SESSION['id'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Painel Administrativo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="planos.php">Planos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>