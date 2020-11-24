<div class="container mt-5">
    <!-- exibição de informações de pasteis que o cliente pediu -->

    <?php $res = ucfirst($dados_cliente[0]->nome_cli); ?>

    <h3 class="h3 ml-2"><?php echo $res;;?>, pediu esses pastéis</h3>
    <div class="row">
        <div class="col-sm col-md">

            <div class="row">
                <div class="col-sm col-md table-responsive">
                    <table class="table table-hover">

                        <thead class="bg-warning table-dark">
                            <tr class="text-left">
                                <th scope="col">Sabor Pastel</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <?php if(isset($dados_pastel) && count($dados_pastel)):?>
                        <tbody class="text-left">

                            <?php foreach($dados_pastel as $value_pastel): ?>
                            <tr>
                                <th><?php echo $value_pastel->sabor_pastel; ?></th>
                                <th><?php echo $value_pastel->valor_unidade; ?></th>
                                <th><?php echo $value_pastel->qtd_pastel; ?></th>
                                <th><?php echo $value_pastel->total; ?></th>
                            </tr>


                            <?php  endforeach ?>

                        </tbody>
                        <?php else: ?>
                        <td colspan="6" class=" text-dark h5 text-center">
                            <?php  echo "<p>O cliente nao pedido pastel</p>"; ?></td>
                        <?php endif ?>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>


<div class="container">
    <hr class="border">
</div>

<div class="container">
    <!-- informações das bebidas escolhida pelo cliente -->

    <h3 class="h3 ml-2">E essas Bebidas</h3>
    <div class="row">
        <div class="col-sm">

            <table class="table table-hover">

                <thead class="bg-warning table-dark">
                    <tr class="text-left">
                        <th scope="col">Tipo Bebida</th>
                        <th scope="col">Unidade(ML/Lts)</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <?php if(isset($dados_bebida) && count($dados_bebida)): ?>
                <tbody class="text-left">

                    <?php foreach($dados_bebida as $bebida): ?>

                    <tr>
                        <td><?php echo $bebida->tipo_bebida; ?></td>
                        <td><?php echo $bebida->quantidade_ml; ?></td>
                        <td><?php echo $bebida->valor_unidade; ?></td>
                    </tr>

                    <?php endforeach ?>

                    <?php else: ?>

                    <td colspan="6" class="my-3 text-dark h5 text-center">
                        <?php  echo "<p>O cliente nao pedido bebida</p>"; ?></td>

                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container">
    <hr class="border">
</div>
<!-- exibição das informações do cliente -->
<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <h1 class="text-center mb-5">Dados Cliente</h1>
            <?php if(isset($dados_cliente)): ?>


            <form class="pt-3" action="" method="POST" id="form_pedido_cliente_on" autocomplete='off'>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Seu Nome</label>
                        <input value="<?php echo $dados_cliente[0]->nome_cli; ?>" type="text" class="form-control"
                            name="cNome" id="nome" disabled />
                    </div>

                    <div class="form-group col-sm-6 col-md-5">
                        <label>Celular</label>
                        <input value="<?php echo $dados_cliente[0]->telefone; ?>" class="form-control" type="text"
                            name="cCelular" id="xCelular" disabled />
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Bairro</label>
                        <input value="<?php echo $dados_cliente[0]->bairro; ?>" class="form-control" type="text"
                            name="cBairro" id="xBairro" disabled />
                    </div>

                    <div class="form-group col-sm-6 col-md-5">
                        <label>Número º</label>
                        <input value="<?php echo $dados_cliente[0]->numero_end; ?>" type="number" class="form-control"
                            name="cNumero" id="xNumero" disabled />
                    </div>
                </div>

                <div class="form-row justify-content-center">

                    <div class="form-group col-sm-6 col-md-5">
                        <label>Complemento</label>
                        <input value="<?php echo $dados_cliente[0]->complemento_end; ?>" type="text"
                            class="form-control" name="cComp" id="xComp" disabled />
                    </div>

                    <div class="form-group col-sm-6 col-md-5">

                        <label for="inputEst">Forma de pagamento</label>

                        <select id="inputEst" name="sel_forma_pagamento" class="form-control" required disabled>

                            <?php $forma_pag = "Dinheiro";?>
                            <?php if($forma_pag == "Dinheiro"):?>
                            <option selected value="Dinheiro">Dinheiro</option>
                            <?php else:?>
                            <option selected value="Cartao">Cartão</option>

                            <?php endif ?>
                        </select>

                    </div>
                </div>
 
            </form>
            <?php endif ?>
        </div>

    </div>
    <div class="container">
        <hr class="border">
    </div>
    <!-- esta linha abaixo tera informação do pedido que será modifica pelo admin -->
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <h1 class="text-center mb-5">Dados Pedido</h1>
            <?php if(isset($dados_cliente)): ?>
            <!-- informações do pedido 
            id_pedido, valor_total, forma_pagamento = cartao, situacao, data_pedido, taxa_entrega -->

            <form class="pt-3"
                action="?pag=area_restrita/update_pedido/<?php echo $dados_pedido[0]->id_pedido;?>/<?php echo $dados_pedido[0]->forma_entrega;?>"
                method="POST" id="form_edita_pedido" autocomplete='off'>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Sub Total</label>
                        <input value="<?php echo $dados_pedido[0]->valor_total; ?>" type="text" class="form-control"
                            disabled />
                    </div>

                    <div class="form-group col-sm-6 col-md-5">
                        <label>Forma Entrega</label>
                        <input value="<?php echo $dados_pedido[0]->forma_entrega; ?>" class="form-control" type="text"
                            disabled />
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Data Pedido</label>
                        <input value="<?php echo $dados_pedido[0]->data_pedido; ?>" type="text" class="form-control"
                            disabled />
                    </div>
                    <div class="form-group col-sm-6 col-md-5">
                        <label for="inputEst">Forma Pagamento</label>

                        <select id="inputEst" class="form-control" required disabled>
                           
                            <?php $forma_pag = $dados_pedido[0]->cartao;?>
                            <?php if($forma_pag == "Dinheiro"):?>
                            <option selected value="Dinheiro">Dinheiro</option>
                            <?php else:?>
                            <option selected value="Cartao">Cartão</option>

                            <?php endif ?>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Taxa Entrega</label>
                        <!-- <?php //echo $dados_pedido[0]->taxa_entrega; ?> -->
                        <input value="" class="form-control positive" type="text"
                            name="cTaxa_Entrega" id="xTaxa_Entrega"
                            title="valores validos ex: 1.00, 5.00, 3 | valores invalidos ex: 1.50, 6.58, 2.99"
                            required  maxlength="5" placeholder="0.00" />

                    </div><!-- verificar este campo se foi enviado um valor do tipo float antes de inserir no banco-->

                    <div class="form-group col-sm-6 col-md-5">

                        <label for="forma_pag">Situação</label>
                        <select id="forma_pag" name="cSituacao" class="form-control" required>
                            <option selected value="<?php echo $dados_pedido[0]->situacao; ?>">Em andamento</option>
                            <option value="Pedido Enviado">Pedido Enviado</option>
                        </select>

                    </div>
                </div>


                <div class="form-row justify-content-center">
                    <div class="col-sm-12 col-md-10 ">
                        <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                            value="Editar Pedido" />
                    </div>
                </div>
            </form>
            <?php endif ?>
        </div>
    </div>
</div>
</div>
