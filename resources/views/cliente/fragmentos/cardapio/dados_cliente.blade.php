<section class="row justify-content-center" id="div_dados_cliente" style="display: none;">
    <!-- formulario dados do cliente -->
    <section class="col-md-12 col-sm-12">
        @if(isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel']) > 0)
            <aside class="row-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="p-3 text-center" style="font-size:25px;">Informações do Cliente</strong>
                    </div>
                </div>
            </aside>
            <form class="row justify-content-center" id="form_pedido_cliente_on" action="#" method="post">
                <section class="col-md-12 col-sm-12">
                    <section class="row mb-3">
                        <aside class="col-md-6 col-sm-12">
                            <label>Seu Nome</label><span class="text-danger"> *</span>
                            <input type="text" class="form-control" value="nome" name="cNome" id="nome" readonly />
                        </aside>
                        <aside class="col-md-6 col-sm-12">
                            <label>Celular</label><span class="text-danger"> *</span>
                            <input class="form-control" type="text" value="75489675465" name="telefone" id="telefone" readonly />
                        </aside>
                    </section>
                    <section class="row mb-3">
                        <aside class="col-md-4 col-sm-12">
                            <label>Bairro</label>
                            <input class="form-control" type="text" value="bairro" name="bairro" id="bairro" readonly />
                        </aside>
                        <aside class="col-md-4 col-sm-12">
                            <label>Número º</label>
                            <input type="number" class="form-control" value="numero" name="numero" id="numero" readonly />
                        </aside>
                        <aside class="col-md-4 col-sm-12">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" value="complemento" readonly />
                        </aside>
                    </section>
                    <section class="row mb-3">
                        <aside class="col">
                            <label for="inputEst">Forma de pagamento <span class="text-danger"> *</span></label>
                            <select id="inputEst" name="sel_forma_pagamento" class="form-control" required>
                                <option selected value="">Escolha</option>
                                <option value="Dinheiro">Dinheiro</option>
                                <option value="Cartao">Cartão</option>
                            </select>
                        </aside>
                    </section>
                    <section class="row mb-3">
                        <aside class="col-md-12 mb-2">
                            <label>Escolha a forma de entrega do pedido</label>
                        </aside>
                        <aside class="row flex-row">
                            <aside class="col-md-auto col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="forma_entrega" id="Retirada" value="Retirada" checked required />
                                    <label class="form-check-label" for="Retirada">Retirada </label>
                                </div>
                            </aside>
                            <aside class="col-md-auto col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="forma_entrega" id="Entrega" value="Entrega" required />
                                    <label class="form-check-label" for="Entrega">Entrega</label>
                                </div>
                            </aside>
                        </aside>
                    </section>
                    <section class="row justify-content-end mb-5">
                        <aside class="col-md-auto ">
                            <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                            value="Finalizar Pedido" />
                        </aside>
                    </section>
                </section>
            </form>
        @else
            <section class="alert alert-info" role="alert">
                <aside class="text-center">
                    <span class="text-dark">Escolha um lanche para continuar!</span>
                </aside>
            </section>
        @endif

        <section class="row">
            <aside >
                <hr class="border">
            </aside>
            <aside class="alert alert-info ">
                É importante que antes de enviar seus pedido verificar no ícone
                do carrinho se os items adicionados estão correto, caso a
                quantidade de items adicionados não esteja como pediu você
                pode remover-lo clicando no link
                <span class="text-danger" style="text-decoration: underline;">
                    Excluir
                </span>
                no menu ao seu lado esquerdo "Pastel" ou "Bebidas".
            </aside>
        </section>
    </section>
</section>
