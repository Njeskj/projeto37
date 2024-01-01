<!-- Navbar Dashboard -->
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
    <div class="container">

        <!-- Botão que abre o modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verificarConexaoModal">
            Verificar Conexão com o Servidor
        </button>

        <!-- Modal -->
        <div class="modal fade" id="verificarConexaoModal" tabindex="-1" aria-labelledby="verificarConexaoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verificarConexaoModalLabel">Verificar Conexão com o Servidor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Conteúdo do modal, como a mensagem de verificação de conexão -->
                        <p id="statusMensagem">Verificando a conexão com o servidor...</p>
                        <!-- Aqui você pode adicionar lógica de verificação de conexão com o servidor -->
                        <script>
                            // Função para verificar a conexão com o servidor
                            function verificarConexao() {
                                // Realiza uma requisição Ajax para o script PHP de verificação
                                var xhr = new XMLHttpRequest();
                                xhr.open("GET", "vdb.php", true);

                                xhr.onload = function() {
                                    if (xhr.status == 200) {
                                        var response = JSON.parse(xhr.responseText);
                                        document.getElementById("statusMensagem").innerHTML = response.message;
                                    } else {
                                        document.getElementById("statusMensagem").innerHTML = "Erro ao verificar a conexão.";
                                    }
                                };

                                xhr.send();
                            }

                            // Chama a função de verificação ao abrir o modal
                            document.getElementById("verificarConexaoModal").addEventListener("shown.bs.modal", function() {
                                verificarConexao();
                            });
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <!-- Adicione outros botões conforme necessário -->
                    </div>
                </div>
            </div>
        </div>


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