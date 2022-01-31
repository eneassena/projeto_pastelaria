<div class="col-auto">
    <!-- Button trigger modal -->
    <a class="pr-3 pb-3" data-bs-toggle="modal" data-bs-target="#cart">
        <i class="fa fa-cart-plus text-danger" style="font-size:48px;cursor:pointer;"></i>
    </a>
</div>
<!-- Modal Cart -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Carrinho De Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <!-- modal exibindo informações do pastel que vem do carrinho pastel -->
                    <h1 class="h6">Meus Pastéis</h1>
                    <table class="table table-sm">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sabor</th>
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
                </div>

                <div class="table-responsive">
                    <!-- informação abaixo é as informações das bebidas -->
                    <h1 class="mt-5 h6">Minhas Bebida</h1>
                    <table class="table table-sm">
                        <thead class="bg-warning text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Bebida</th>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Voltar</button>
            </div>
        </div>
    </div>
</div>
