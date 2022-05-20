<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h5 text-center" id="exampleModalLongTitle">Faça seu login ou cadastre-se para
                    fazer pedidos de forma mais rápida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span><!-- &times; -->
                </button>
            </div>

            <div class="modal-body">
                <div class="row justify-content-center">
                    <form action="<?= url('cliente/check-login') ?>"
                      method="POST"
                          id="login-app">
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label>Usuário</label>
                                <input type="text" class="form-control"
                                name="user_login"
                                id="user_login"
                                placeholder="Entre usuário" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label>Password</label>
                                <input type="password" class="form-control"
                                name="user_senha"
                                id="user_senha"
                                placeholder="Entre password" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <button class="btn btn-warning">Entrar</button>
                                <?php if(!isset($_SESSION['user_cliente'])): ?>
                                    <a href="<?= url('cliente/cadastro'); ?>"
                                      style="float: right;"
                                      class="text-muted mt-1"
                                      id="cadastrar_cliente">
                                      Fazer Cadastro
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
