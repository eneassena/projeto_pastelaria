<div class="row justify-content-end pr-3 py-3">
 
  <!-- Button trigger modal -->
  <a class="pr-3 pb-3 cart" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-cart-plus text-danger" style="font-size:48px;"></i>
  </a>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
              <?php if ( valida_exibicao(getProdutos('pastel') )) : ?>
                  <?php foreach (getProdutos('pastel') as $value_carpadio) : ?>
                      <tr>
                        <td>#</td>
                        <td><?= $value_carpadio['item']->saborDoPastel ?></td>
                        <td><?= $value_carpadio['qtd'] ?></td>
                        <td><?= formata_precos($value_carpadio['item']->valorUnitario) ?></td>
                        <td><?= formata_precos($value_carpadio['item']->valorUnitario * $value_carpadio['qtd']) ?></td>
                      </tr>
                  <?php endforeach ?>
              <?php else : ?>
                <tr>
                  <td colspan="5" class="text-center mt-3">
                    <?php echo "ainda não há pastel no carrinho"; ?>
                  </td>
                </tr>
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
              <?php if  (valida_exibicao(getProdutos('bebida')) ) : ?>
                  <?php foreach (getProdutos('bebida') as $value_bebida) : ?>
                      <tr>
                        <td>#</td>
                        <td><?= $value_bebida['item']->sabor." | ". $value_bebida['item']->quantidadeEmMl ?></td>
                        <td><?= $value_bebida['qtd'] ?></td>
                        <td><?= formata_precos($value_bebida['item']->valorUnidade) ?></td>
                        <td><?= formata_precos(( (float)$value_bebida['item']->valorUnidade * (int)$value_bebida['qtd'])) ?></td>
                      </tr>
                <?php endforeach ?>
              <?php else : ?>
                <tr>
                  <td colspan="5" class="text-center mt-3">
                    <?= "ainda não há bebida no carrinho"; ?>
                  </td>
                </tr>
              <?php endif ?>
            </tbody>
          </table>
        </div>
          <div class="row justify-content-between">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="text-muted">Total R$: <span><?= \Src\service\StoreService::calc_total() ?></span></h5>
                      </div>
                  </div>

              </div>
          </div>

        <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button> </div>

      </div>
    </div>
  </div> <!-- finalização do modal -->
</div>
