<?php
include 'header.php';
include 'navbar.php';
?>

<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal">Preços e Planos</h1>
    <p class="fs-5 text-muted">Escolha o plano que melhor atenda às suas necessidades.</p>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Básico</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$ 19,99</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Recursos básicos</li>
                        <li>Suporte por email</li>
                        <li>Acesso limitado</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Escolher</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Padrão</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$ 39,99</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Recursos intermediários</li>
                        <li>Suporte por email e chat</li>
                        <li>Acesso ilimitado</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Escolher</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Premium</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">R$ 59,99</h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>Todos os recursos</li>
                        <li>Suporte prioritário 24/7</li>
                        <li>Acesso ilimitado</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Escolher</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>