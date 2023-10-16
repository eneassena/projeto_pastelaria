<!-- adicionar bebidas ao carrinho -->
<div class="row" id="divBebidas" style="display: none">
  <div class="col-sm col-md mt-1 table-responsive">

      <div class="row">
          <div class="col-md-12">
              <div class="card-header">
                  <h1 class="text-muted">Bebidas</h1>
              </div>
          </div>
      </div>

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
        <?php if (isset($bebidas) && count($bebidas) != 0) : ?>
            <?php foreach ($bebidas as $bebida) : ?>
              <tr>
                <td></td>
                <td>
                  <?= $bebida->sabor; ?> <?= $bebida->quantidadeEmMl; ?>
                </td>
                <td><?= $bebida->valorUnidade; ?></td>
                <td class="text-center">
                  <a class='text-success' href="<?= inFuncionamento() ? url('pedido/add-bebida') . "/" . $bebida->idBebida : '#' ?>">
                    Adicionar
                  </a>
                </td>
                <td class="text-center">
                  <a class="text-danger" href="<?= inFuncionamento() ? url('pedido/remove-bebida') . "/" . $bebida->idBebida: "#" ?>">
                    Excluir
                  </a>
                </td>
              </tr>
            <?php endforeach ?>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>