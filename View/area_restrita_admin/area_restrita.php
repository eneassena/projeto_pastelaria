<div class="container-fluid">
    <?php if(isset($messagem_area_restrita)): ?>
    <p class="text-muted my-2 ml-2 " style="text-shadow: 5px 5px 10px rgba(0,0,0,0.5);font-size: 18px;"><strong><?php echo $messagem_area_restrita;?></strong></p>
    <?php endif ?>

    <?php if(isset($pastel_restrito) && isset($bebidas_restrita)): ?>


    <?php endif ?>
    <div class="row ">
        <div class="col-sm-3  mt-5">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                    href="#list-pedido" role="tab" aria-controls="home">Pedidos Enviados</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                    href="#list-pastel" role="tab" aria-controls="profile">Adicionar pastel</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                    href="#list-bebida" role="tab" aria-controls="messages">Adicionar Bebida</a>
            </div>
        </div>

        <div class="col-sm-9 mt-2">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-pedido" role="tabpanel"
                    aria-labelledby="list-home-list">

                    <div class="row-col-12 table-responsive">
                        <h3 class="h3 text-center">Pedidos Enviados</h3>
                        <table class="table table-hover">

                            <thead class="bg-warning table-dark">
                                <tr class="text-left">
                                    <th>#</th>

                                    <th scope="col">Cliente</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Forma Entrega</th>
                                    <th scope="col">Forma Pagamento</th>
                                    <th scope="col">Sub-Total</th>
                                    <th scope="col">Taxa Entrega</th>
                                    <th scope="col">Valor Total</th>
                                    <th scope="col">Edição Pedido</th>
                                </tr>
                            </thead>

                            <tbody class="text-left">
                                <?php if(isset($pedido_restrita) && count($pedido_restrita) > 0 ): ?>

                                <?php foreach($pedido_restrita as $field => $value): ?>
                                <?php $total = 0;?>

                                <?php $total = $value->valor_total + $value->taxa_entrega; // calculando vlaor total do pedido?>

                                <tr>
                                    <td></td>
                                    <td> <?php echo $value->nome_cli;  ?> </td>
                                    <td> <?php echo $value->situacao;  ?> </td>
                                    <td> <?php echo $value->forma_entrega;  ?> </td>
                                    <td> <?php echo $value->cartao;  ?> </td>
                                    <td> R$ <?php echo number_format($value->valor_total,2, ",", ".");  ?> </td>
                                    <td> R$ <?php echo number_format( $value->taxa_entrega, 2, ",", ".");  ?> </td>
                                    <td> R$ <?php echo number_format($total,2, ",", ".");  ?> </td>
                                    <?php if($value->situacao == "em andamento"  && $value->forma_entrega == "Entrega"):?>

                                    <td><a class="text-success" href="?pag=area_restrita/editar_pedido/<?php echo $value->id_pedido; ?>">Editar Pedido</a></td>
                                    
                                    <?php elseif($value->forma_entrega == "Retirada"): ?>
                                    
                                    <td><a class="text-danger" href="?pag=area_restrita/delete_pedido_retirada/<?php echo $value->id_pedido; ?>">Excluir Pedido</a></td>
                                    
                                    <?php endif?>
                                </tr>

                                <?php  endforeach ?>
                                <?php  else: ?>
                                <tr>
                                    <td colspan="9" class="text-muted text-center"><strong>Não há pedido No
                                            Momento!</strong></td>
                                </tr>

                                <?php endif ?>

                            </tbody>

                        </table>
                    </div>
                </div>

                <!--  add pastel -->
                <div class="tab-pane fade" id="list-pastel" role="tabpanel" aria-labelledby="list-profile-list">
                    <!-- ================================================================================================== -->
                    <div class="row mt-5">
                        <!-- exibindo formulario para adicionar novos pasteis -->
                        <div class="btn-group ml-3" role="group" aria-label="Exemplo básico">
                            <a id="consultar_pastel" class="btn btn-warning"><b>Adicionar pastel</b></a>
                        </div>
                    </div>

                    <!-- mostra os pastéis já cadastro -->
                    <div class="row" id="div_consult_pastel" style="display:flex;">
                        <div class="col-sm-12 col-md-12">
                            <h1 class="text-center h1 mt-5 mb-3">Pastéis Cadastrados</h1>
                            <div class="row">
                                <div class="col-sm col-md table-responsive">
                                    <table class="table table-hover">

                                        <thead class="bg-warning table-dark">
                                            <tr class="text-left">
                                                <th scope="col">Nome</th>
                                                <th scope="col">Ingrediente</th>
                                                <th scope="col">Preço</th>
                                                <th scope="col" colspan="2"></th>

                                            </tr>
                                        </thead>

                                        <tbody class="text-left">

                                            <?php if(isset($pastel_restrito)): ?>
                                            <?php if(count($pastel_restrito) != 0): ?>
                                            <?php foreach($pastel_restrito as $cardapio): ?>

                                            <tr>
                                                <td><?php echo $cardapio->nome; ?></td>
                                                <td><?php echo $cardapio->ingrediente; ?></td>
                                                <td><?php echo $cardapio->valor_unidade; ?></td>
                                                <td><a href="?pag=area_restrita/editar_pastel/<?php echo $cardapio->id_cardapio; ?>"
                                                        class="text-success">Editar</a></td>
                                                <td><a href="?pag=area_restrita/excluir_pastel/<?php echo $cardapio->id_cardapio; ?>" class="text-danger">Excluir</a></td>
                                            </tr>

                                            <?php endforeach ?>
                                            <?php endif ?>
                                            <?php  endif ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-center" id="div_add_pastel" style="display:none">

                        <!-- formulario para adicionar novos pasteís -->
                        <div class="col-sm-6">

                            <h1 class="h1 text-center mt-5 mb-3">Adicionar Pastel</h1>
                            <form class="pt-3" action="?pag=area_restrita/add_pastel" method="POST"
                                id="form_pedido_cliente_on" autocomplete='off'>

                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Pastel Sabor</label>
                                        <input type="text" class="form-control" name="pSabor" id="pSabor"
                                            placeholder="pastel sabor" required />
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Ingrediente do Pastel</label>
                                        <input class="form-control" type="text" name="iIngred" id="iIngred"
                                            placeholder="ingrediente 1, ingrediente 2, ingrediente 3 ..." required />
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Valor Unidade</label>
                                        <input type="text" class="form-control positive" name="sValor" id="sValor"
                                            placeholder="0,00" required maxlength="5" />
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12">
                                        <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                                            value="Adicionar Pastel" />
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- add bebidas -->
                <div class="tab-pane fade" id="list-bebida" role="tabpanel" aria-labelledby="list-messages-list">
                    <div class="row mt-5">

                        <!-- Exibindo formulário para adicionar novas bebidas -->
                        <div class="btn-group ml-3" role="group" aria-label="Exemplo básico">
                            <a id="button_ativa_bebida" class="btn btn-warning"><strong>Adicionar Bebida</strong></a>

                        </div>
                    </div>

                    <!-- mostra os pastéis já cadastro -->
                    <div class="row" style="display:flex;" id="table_bebida">
                        <div class="col-sm-12">
                            <h1 class="h1 text-center mt-5 mb-3">Bebidas Cadastradas</h1>

                            <div class="col-sm col-md table-responsive">
                                <table class="table table-hover">

                                    <thead class="bg-warning table-dark">
                                        <tr class="text-left">
                                            <th scope="col">Tipo Bebida</th>
                                            <th scope="col">Unidade(ML/Lts)</th>
                                            <th scope="col">Sabor</th>
                                            <th scope="col">Fruta</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col" colspan="2"></th>
                                        </tr>
                                    </thead>


                                    <tbody class="text-left">
                                        <?php if(isset($bebidas_restrita)): ?>
                                        <?php if(count($bebidas_restrita) != 0): ?>
                                        <?php foreach($bebidas_restrita as $bebida): ?>


                                        <tr>
                                            <td><?php echo $bebida->tipo_bebida; ?></td>
                                            <td><?php echo $bebida->quantidade_ml; ?></td>
                                            <td><?php echo $bebida->sabor; ?></td>
                                            <td><?php echo $bebida->fruto; ?></td>
                                            <td><?php echo $bebida->valor_unidade; ?></td>
                                            <td class="text-center">
                                                <a href="?pag=area_restrita/editar_bebida/<?php echo $bebida->id_bebida; ?>" class="text-success">Editar</a></td>
                                            <td class="text-center"><a href="?pag=area_restrita/excluir_bebida/<?php echo $bebida->id_bebida; ?>" class="text-danger">Excluir</a></td>
                                            
                                        </tr>

                                        <?php endforeach ?>
                                        <?php endif ?>
                                        <?php endif ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="row justify-content-center" id="form_bebida" style="display:none">


                        <!-- formulario para adicionar novos pasteís -->
                        <div class="col-sm-6">

                            <h1 class="h1 text-center mt-5 mb-3">Adicionar Bebida</h1>
                            <form class="pt-3" action="?pag=area_restrita/add_bebidas" method="POST"
                                id="form_pedido_add_bebida" autocomplete='off'>

                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Tipo da Bebida</label>
                                        <input type="text" class="form-control" required name="tBebida" id="tBebida"
                                            placeholder="ex: água, suco, refrigerante, ceveja" />
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Sabor (opcional)</label>
                                        <input type="text" class="form-control" name="cxSabor" id="cxSabor"
                                            placeholder="especifico para sucos" />
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Fruta (opcional)</label>
                                        <input class="form-control" type="text" name="inFruta" id="inFruta"
                                            placeholder="especifico para sucos" />
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Quantidade em ML</label>
                                        <input type="text" class="form-control" name="inQtd" id="inQtd" required
                                            placeholder="ex: 1L, 500ML, 350ML, 2L" />
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label>Valor Unidade</label>
                                        <input type="text" class="form-control positive" name="inValorUnidade"
                                            id="inValorUnidade" required placeholder="0,00" maxlength="5" />
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12">
                                        <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                                            value="Adicionar Bebida" />
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

 