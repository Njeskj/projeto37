<?php
include 'header.php';
include 'navbar.php';
include 'navdash.php';
?>


<div class="container-cadastro">
    <section>
        <?php
        // Verificar se foi fornecido um parâmetro 'pagina' na URL
        if (isset($_GET['p'])) {
            $p = $_GET['p'];

            // Validar o nome da página para evitar inclusão de arquivos indesejados
            $paginasPermitidas = ['conpedido'];
            if (in_array($p, $paginasPermitidas)) {
                // Incluir a página correspondente
                include("$p.php");
            } else {
                echo "Página não encontrada.";
            }
        } else {
            echo "Selecione uma página na barra de navegação.";
        }
        ?>
    </section>
</div>



<?php
include 'footer.php';
?>