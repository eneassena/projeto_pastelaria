<div class="row" id="div_bebidas" style="display: none;">
    <div class="col-sm col-md mt-1 table-responsive">
        <aside class="row-12">
            <div class="card">
                <div class="card-header">
                    <strong class="p-3" style="font-size:25px;">Bebidas</strong>
                </div>
            </div>
        </aside>
        <table class="table table-hover">
            <thead class="bg-warning text-white">
                <tr class="text-left">
                    <th>#</th>
                    <th scope="col">Tipo Bebida</th>
                    <th scope="col">Preço</th>
                    <th class="text-center" scope="col" colspan="2">Carrinho</th>
                </tr>
            </thead>
            <tbody class="text-left">
                <?php if(isset($bebidas)): foreach($bebidas as $row => $bebida): if($row==5) break; ?>
                <tr>
                    <td></td>
                    <td>
                        <?= $bebida->tipo_bebida; ?>, <?= $bebida->sabor; ?>, <?= $bebida->tamanho; ?>
                    </td>
                    <td><?= $bebida->valor; ?></td>
                    <td class="text-center"><a class='text-success'href="#">Adicionar</a></td>
                    <td class="text-center"><a class="text-danger" href="#">Excluir</a> </td>
                </tr>
                <?php endforeach ?>

                <?php else: ?>
                    <tr class="text-center">
                        <td colspan="5">
                            <span>Não há produtos na loja.</span>
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
