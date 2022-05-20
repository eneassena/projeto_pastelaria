  <?php if (isset($_SESSION['person_comun']['on'])) : ?>
    <a href="<?= url('pedido') ?>" class="card-link btn btn-warning">Pedir</a>
  <?php else : ?>
    <a id="maravilha_btn" title="Faça login para fazer um pedido" href="#" class="card-link btn btn-warning">Pedir</a>
  <?php endif ?>