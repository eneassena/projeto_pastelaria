<div class="row" id="div_pastel" style="display: block;">
    <div class="col-sm col-md table-responsive">
        <!-- messagem do carrinho após adicionar (1)um item -->
        <aside class="row-12">
            <div class="card">
                <div class="card-header">
                    <strong class="p-3" style="font-size:25px;">Pasteis</strong>
                </div>
            </div>
        </aside>
        <table class="table table-hover">
            <thead class="bg-warning text-white">
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Sabor</th>
                    <th scope="col">Ingrediente</th>
                    <th scope="col">Preço</th>
                    <th scope="col" colspan="2">Carrinho</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($cardapios)): ?>
                <?php foreach($cardapios as $row => $cardapio): if($row==5) break; ?>
                <tr>
                    <td>#</td>
                    <td><?= $cardapio->sabor; ?></td>
                    <td><?= $cardapio->ingrediente; ?></td>
                    <td><?= $cardapio->valor; ?></td>
                    <td><a class='text-success' href="#">Adicionar</a></td>
                    <td><a class="text-danger" href="#">Excluir</a></td>
                </tr>
                <?php endforeach ?>
                <?php else: ?>
                    <tr class="text-center">
                        <td colspan="5">
                            <span>Não há produtos na loja.</span>
                        </td>
                    </tr>
                <?php  endif ?>
            </tbody>
        </table>
    </div>
</div>
