<?php $this->layout("admin/_theme", [
        'title' => isset($title) ? $title : '',
    'user' => isset($user) ? $user : '',
    'message' => "pedido"
])?>

<?php if(isset($message)): ?>
	<div class="row">
		<div class="col alert alert-info">
		  <span class="text-white"><?= $message?></span>
		</div>
	</div>
<?php  endif; ?>
 
<div class="wrapper">

<div class="col-12 mt-5">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title mt-3 mb-2">Pedidos Enviados</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 350px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
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
        <tbody>
          <?php if (isset($pedidos) && count($pedidos) > 0) : ?>
              <?php foreach ($pedidos as $field => $value) : ?>
                <tr>
                    <td><?= $value->nome; ?></td>
                    <td><?= $value->situacao; ?></td>
                    <td><?= $value->formaDeEntrega; ?></td>
                    <td><?= $value->tipoDoPagamento; ?></td>
                    <td>R$ <?= formata_precos($value->subtotal); ?></td>
                    <td>R$ <?= formata_precos($value->taxaDeEntrega); ?></td>
                    <td> R$ <?= formata_precos($value->total); ?></td>
                    <td>
                        <a href="<?= url("area-restrita/detalhes-pedido/$value->idPedido") ?>" class="btn btn-outline-warning mr-2">Editar</a>
                        <a href="<?= url("area-restrita/remove-pedido/$value->idPedido") ?>" class="btn btn-outline-danger ml-1">Apagar</a>
                    </td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td colspan="9" class="text-muted text-center"><strong>Não há pedido No Momento!</strong></td>
              </tr>
            <?php endif ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
</div>
