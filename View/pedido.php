<!-- corpo da pagina pedido  -->

<div class="container">

    <div class="row my-5">

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark ">Tempo de Entraga 15 - 60 minutos</span>
        </div>

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark">Taxa de Entraga 2 - 15</span>
        </div>

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark">Forma de Entrega</span>
            <span>Delivery ou Retirada</span>
        </div>

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark">Funcionamento 17H a 23H</span>
        </div>

    </div> <!-- fim do container 1-->
    <div class="row justify-content-end">
    <span style="text-shadow: 3px 3px 10px rgba(0,0,0,0.7)" class="mx-3 text-muted">Aberta de Segunda a Domingo, exceto Quarta e Quinta.</span>
    </div>
    <hr class="border">

    <!-- -------------------------------------------------------------------------------------- -->

    <div class="row justify-content-center">
        <!-- lista de informações -->
        <div class="col-sm-3 col-md-3 col-lg-3">
            <ul class="list-group">
                <li class="list-group-item text-dark border" id="liPastel">Pastel</li>
                <li class="list-group-item text-dark border" id="liBebida">Bebidas</li>
                <li class="list-group-item text-dark border" id="liDados_cliente">Dados do Cliente</li>
            </ul>
        </div>


        <!-- conteudo de formularios -->
        <div class="col-sm-9">

            <div class="row justify-content-betweens">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-warning mt-2 ml-3" data-toggle="modal"
                    data-target="#staticBackdrop">
                    Bairros de entrega
                </button> 
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Bairro de entrega da pastelaria</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- modal exibindo informações do pastel que vem do carrinho pastel -->
                                <h1 class="h6">Bairros de entrega:</h1>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Bairro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($bairro_entrega) && count($bairro_entrega)): ?> 
                                        <?php foreach($bairro_entrega as $valoresBairro): ?> 
                                        <tr>
                                            <td></td>
                                            <td><?php echo $valoresBairro->nome_bairro; ?></td>
                                        </tr> 
                                        <?php endforeach ?> 
                                        <?php else: ?> 
                                        <tr>
                                            <td colspan="5" class="text-center mt-3">
                                                <?php echo "ainda não há bairro de entrega cadastrado!"; ?>
                                            </td>
                                        </tr> 
                                        <?php endif ?> 
                                    </tbody> 
                                </table> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>  
            </div> 

            <div class="row justify-content-end pr-3 py-3"> 
                <!-- Button trigger modal -->
                <a class="pr-3 pb-3" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-cart-plus text-danger" style="font-size:48px;"></i> 
                </a> 
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Carrinho De Pedido</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- modal exibindo informações do pastel que vem do carrinho pastel -->
                                <h1 class="h6">Meus Pastéis</h1>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome Pastel</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($cardapio_pastel) && count($cardapio_pastel)): ?>
                                        <?php if(isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel'])): ?>
                                        <?php $subtotal = (float)0;?>
                                        <?php foreach($_SESSION['carrinho_pastel'] as $idcarrinho => $valoresCar): ?>
                                        <?php foreach($cardapio_pastel as $idcardapio => $valoresTab): ?>
                                        <?php if($idcarrinho == $valoresTab->id_cardapio): ?>
                                        <?php $subtotal = $valoresTab->valor_unidade * $valoresCar;?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $valoresTab->nome; ?></td>
                                            <td><?php echo $valoresCar; ?></td>
                                            <td><?php echo $valoresTab->valor_unidade; ?></td>
                                            <td><?php echo $subtotal; ?></td>
                                        </tr>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                        <?php endforeach ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center mt-3">
                                                <?php echo "ainda não há pastel no carrinho"; ?>
                                            </td>
                                        </tr>
                                        <?php endif ?>
                                        <?php endif ?>
                                    </tbody>
                                </table> <!-- fim da tabela de exibição dos dados do pastel -->
                                <!-- ------------------------------------------------------ -->

                                <!-- informação abaixo é as informações das bebidas -->
                                <h1 class="mt-5 h6">Minhas Bebida</h1>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome Bebida</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(isset($bebidas) && count($bebidas)): ?>
                                        <?php if(isset($_SESSION['carrinho_bebidas']) && count($_SESSION['carrinho_bebidas'])): ?>
                                        <?php $subtotal = (float)0;?>
                                        <?php foreach($_SESSION['carrinho_bebidas'] as $idcarrinho => $valoresCar): ?>
                                        <?php foreach($bebidas as $idbebida => $valoresTab): ?>
                                        <?php if($idcarrinho == $valoresTab->id_bebida): ?>
                                        <?php $subtotal = $valoresTab->valor_unidade * $valoresCar;?>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <?php echo $valoresTab->tipo_bebida; ?> |
                                                <?php echo $valoresTab->quantidade_ml; ?>
                                            </td>
                                            <td><?php echo $valoresCar; ?></td>
                                            <td><?php echo $valoresTab->valor_unidade; ?></td>
                                            <td><?php echo $subtotal; ?></td>
                                        </tr>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                        <?php endforeach ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center mt-3">
                                                <?php echo "ainda não há bebida no carrinho"; ?>
                                            </td>
                                        </tr>
                                        <?php endif ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- finalização do modal -->
            </div>

            <!-- adicionar pastel no carrinho de sessao -->
            <div class="row" id="div_pastel" style="display: flex;">
                <div class="col-sm col-md table-responsive">
                    <!-- messagem do carrinho após adicionar (1)um item -->
                    <?php if(isset($messagem_pastel) && !empty($messagem_pastel)): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo "<h5 class='text-center'>$messagem_pastel</h5>"; ?>
                    </div>
                    <?php endif; ?>
                    <table class="table table-hover">
                        <thead class="bg-warning table-dark">
                            <tr class="text-center">
                                <th scope="col">Nome</th>
                                <th scope="col">Ingrediente</th>
                                <th scope="col">Preço</th>
                                <th scope="col" colspan="2">Carrinho</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($cardapio_pastel)): ?>
                            <?php if(count($cardapio_pastel) != 0): ?>
                            <?php foreach($cardapio_pastel as $cardapio): ?>
                            <tr>
                                <td><?php echo $cardapio->nome; ?></td>
                                <td><?php echo $cardapio->ingrediente; ?></td>
                                <td><?php echo $cardapio->valor_unidade; ?></td>
                                <td><a class='text-success'
                                        href="?pag=pedido/adicionar_pasteis/<?php echo $cardapio->id_cardapio; ?>">Adicionar</a>
                                </td>
                                <td><a class="text-danger"
                                        href="?pag=pedido/remover_pasteis/<?php echo $cardapio->id_cardapio; ?>">Excluir</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php endif ?>
                            <?php  endif ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- adicionar bebidas ao carrinho -->
            <div class="row" id="div_bebidas" style="display: none;">
                <div class="col-sm col-md mt-1 table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-warning table-dark">
                            <tr class="text-left">
                                <th>#</th>
                                <th scope="col">Tipo Bebida</th>
                                <th scope="col">Preço</th>
                                <th class="text-center" scope="col" colspan="2">Carrinho</th>
                            </tr>
                        </thead>
                        <tbody class="text-left">
                            <?php if(isset($bebidas)): ?>
                            <?php if(count($bebidas) != 0): ?>
                            <?php foreach($bebidas as $bebida): ?>
                            <tr>
                                <td></td>
                                <td>
                                    <?php echo $bebida->tipo_bebida; ?>
                                    <?php echo $bebida->quantidade_ml; ?>
                                </td>
                                <td><?php echo $bebida->valor_unidade; ?></td>
                                <td class="text-center"><a class='text-success'
                                        href="?pag=pedido/adicionar_bebidas/<?php echo $bebida->id_bebida; ?>">Adicionar</a>
                                </td>
                                <td class="text-center"><a class="text-danger"
                                        href="?pag=pedido/remover_bebidas/<?php echo $bebida->id_bebida; ?>">Excluir</a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php endif ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-center" id="div_dados_cliente" style="display: none;">                
                <!-- formulario dados do cliente -->
                <div class="col-sm-12 col-md-10">
                    <h1 class="text-center mb-5">Informações do Cliente</h1>
                    <?php if(isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel']) > 0
                    || isset($_SESSION['carrinho_bebidas']) && count($_SESSION['carrinho_bebidas']) > 0 ):?>
                    <!-- verifica se ha cliente on-line -->
                    <?php if(isset($_SESSION['cliente'])):?>
                    <?php if(isset($cliente_logado) && count($cliente_logado) > 0): ?>
                    <form class="pt-3" action="?pag=carrinho/dadosCliente" method="POST" id="form_pedido_cliente_on"
                        autocomplete='off' onsubmit="validate_pedido_on()">

                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-5">
                                <label>Seu Nome</label><span class="text-danger"> *</span>
                                <input type="text" class="form-control"
                                    value="<?php echo $cliente_logado[0]->nome_cli; ?>" name="cNome" id="nome"
                                    disabled />
                            </div>
                            <div class="form-group col-sm-6 col-md-5">
                                <label>Celular</label><span class="text-danger"> *</span>
                                <input class="form-control" type="text"
                                    value="<?php echo $cliente_logado[0]->telefone; ?>" name="cCelular" id="xCelular"
                                    disabled />
                            </div>
                        </div>

                        <div class="form-row ">
                            <div class="form-group col-sm-6 col-md-5">
                                <label>Bairro</label>
                                <input class="form-control" type="text"
                                    value="<?php echo $cliente_logado[0]->bairro; ?>" name="cBairro" id="xBairro"
                                    disabled />
                            </div>
                            <div class="form-group col-sm-6 col-md-5">
                                <label>Número º</label>
                                <input type="number" class="form-control"
                                    value="<?php echo $cliente_logado[0]->numero_end; ?>" name="cNumero" id="xNumero"
                                    disabled />
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-5">
                                <label>Complemento</label>
                                <input type="text" class="form-control" name="cComp" id="xComp"
                                    value="<?php echo $cliente_logado[0]->complemento_end; ?>" disabled />
                            </div>
                            <div class="form-group col-sm-6 col-md-5">
                                <label for="inputEst">Forma de pagamento <span class="text-danger"> *</span></label>
                                <select id="inputEst" name="sel_forma_pagamento" class="form-control" required>
                                    <option selected value="">Escolha</option>
                                    <option value="Dinheiro">Dinheiro</option>
                                    <option value="Cartao">Cartão</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-sm-12">
                                <label>Escolha a forma de entrega do pedido</label>
                            </div>


                            <div class="form-check col-sm-2 ml-4">
                                <input class="form-check-input" type="radio" name="forma_entrega" id="exampleRadios1"
                                    value="Retirada" checked required />
                                <label class="form-check-label" for="exampleRadios1">Retirada </label>
                            </div>
                            <div class="form-check col-sm-2 ml-4">
                                <input class="form-check-input" type="radio" name="forma_entrega" id="exampleRadios2"
                                    value="Entrega" required />
                                <label class="form-check-label" for="exampleRadios2">Entrega</label>
                            </div>
                        </div>

                        <div class="form-row ">
                            <div class="col-sm-12 col-md-10 ">
                                <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                                    value="Finalizar Pedido" />
                            </div>
                        </div>
                    </form>

                    <?php else: ?>
                    <div class="alert alert-info">
                        <p class="text-center">Caro cliente, click no link no seu lado esquerdo em "Dados do cliente",
                            para que possamos buscar seus
                            dados e podermos finalizar seu pedido!</p>
                    </div>
                </div>

                <?php endif ?>

                <?php else: ?>
                    <!-- formulario de cliente que nao irá se cadastrar somente pedido -->
                <form class="pt-3" action="?pag=carrinho/dadosCliente" method="POST" id="form_pedido_cliente_off"
                    autocomplete='off' onsubmit="return validate_pedido();">
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-5">
                            <label>Seu Nome</label><span class="text-danger"> *</span>
                            <input type="text" class="form-control" name="cNome" id="nome" placeholder="seu nome"
                                required />
                        </div>

                        <div class="form-group col-sm-6 col-md-5">
                            <label>Celular</label><span class="text-danger"> *</span>
                            <input class="form-control" type="text" name="cCelular" id="xCelular"
                                placeholder="ex: (00) 00000-0000" required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-5">
                            <label>Bairro</label>
                            <input class="form-control" type="text" name="cBairro" id="xBairro"
                                placeholder="Entre seu bairro" />
                        </div>

                        <div class="form-group col-sm-6 col-md-5">
                            <label>Número º</label>
                            <input type="number" class="form-control" name="cNumero" id="xNumero"
                                placeholder="Entre N°" />
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-sm-6 col-md-5">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="cComp" id="xComp"
                                placeholder="ex: av, travessa, proxima a praça" />
                        </div>

                        <div class="form-group col-sm-6 col-md-5">

                            <label for="inputEst">Forma de pagamento <span class="text-danger"> *</span></label>

                            <select id="inputEst" name="sel_forma_pagamento" class="form-control" required>
                                <option selected value="">Escolha</option>
                                <option value="Dinheiro">Dinheiro</option>
                                <option value="Cartao">Cartão</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Escolha a forma de entrega do pedido</label>
                        </div>

                        <div class="form-check col-sm-2 ml-4">

                            <input class="form-check-input" type="radio" name="forma_entrega" id="exampleRadios1"
                                value="Retirada" checked required />
                            <label class="form-check-label" for="exampleRadios1">Retirada </label>
                        
                        </div>
                        
                        <div class="form-check col-sm-2 ml-4">
                            <input class="form-check-input" type="radio" name="forma_entrega" id="exampleRadios2"
                                value="Entrega" required />
                            <label class="form-check-label" for="exampleRadios2">Entrega</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-10 ">
                            <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                                value="Finalizar Pedido" />
                        </div>
                    </div>
                </form>
                <?php endif ?>

                <!-- ------------------------------------------------------------------------------------------- -->
                <?php else: ?>
                <div class="alert alert-info" role="alert">
                    <p class="text-center pt-2">
                        Escolha um lanche para enviar seu pedido! <span class="text-danger"> *</span>
                    </p>
                </div>
                <?php endif; ?>

                <div class="alert alert-info my-3">É importante que antes de enviar seus pedido verificar no ícone do carrinho se os items adicionados estão correto, caso a quantidade de items adicionados não esteja como pediu você pode remover-lo clicando no link <span class="text-danger " style="text-decoration: underline;">Excluir</span> no menu ao seu lado esquerdo "Pastel" ou "Bebidas".</div>
            </div>
        </div>
    </div>
</div>

</div>

 