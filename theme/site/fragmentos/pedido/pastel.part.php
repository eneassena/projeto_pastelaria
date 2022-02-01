<!-- adicionar pastel no carrinho de sessao -->
<div class="row" id="divPastel" style="display: block;">
  <div class="col-sm col-md table-responsive">

    <!-- messagem do carrinho após adicionar (1)um item -->
    <?php if (isset($messagem_pastel) && !empty($messagem_pastel)) : ?>
      <div class="alert alert-success" role="alert">
        <?php echo "<h5 class='text-center'>$messagem_pastel</h5>"; ?>
      </div>
    <?php endif; ?>

      <div class="row">
          <div class="col-md-12">
              <div class="card-header">
                <h1 class="text-muted">Pastéis</h1>
              </div>
          </div>
      </div>

    <table class="table table-hover">
      <thead class="bg-warning table-dark">
        <tr class="text-center">
          <th scope="col">Nome</th>
          <th scope="col">Ingrediente</th>
          <th scope="col">Preço</th>
          <th scope="col" colspan="2">Carrinho</th>
        </tr>
      </thead>
      <tbody class="listPastel">

        <?php if (isset($cardapios) && count($cardapios) != 0) : ?>
          <?php foreach ($cardapios as $cardapio) : ?>
            <tr>
              <td><?= $cardapio->saborDoPastel; ?></td>
              <td><?= $cardapio->ingrediente; ?></td>
              <td><?= $cardapio->valorUnitario; ?></td>
              <td>
                <a class='text-success <?= 'addPastel'.$cardapio->idCardapioPastel ?>'
                  href="<?= inFuncionamento() ? url('pedido/add-pastel') . "/" . $cardapio->idCardapioPastel : '#' ?>"
                >
                  Adicionar
                </a>
              </td>
              <td>
                <a class="text-danger" href="<?= inFuncionamento() ? url('pedido/remove-pastel') . "/" . $cardapio->idCardapioPastel : '#' ?>">
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
