<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= assets('adminlte/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= assets('adminlte/dist/css/adminlte.min.css')?>">
  </head>

  <body class="hold-transition sidebar-mini">
    
  <!-- /.content-wrapper -->
  
<div class="row justify-content-center mt-5">
  <div class="col-md-11">
    <div class="tab-pane fade show active" id="list-pedido" role="tabpanel" aria-labelledby="list-home-list">

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
            <?php if (isset($pedido_restrita) && count($pedido_restrita) > 0) : ?>

              <?php foreach ($pedido_restrita as $field => $value) : ?>
                <?php $total = 0; ?>

                <?php $total = $value->valor_total + $value->taxa_entrega; // calculando vlaor total do pedido
                ?>

                <tr>
                  <td></td>
                  <td> <?php echo $value->nome_cli;  ?> </td>
                  <td> <?php echo $value->situacao;  ?> </td>
                  <td> <?php echo $value->forma_entrega;  ?> </td>
                  <td> <?php echo $value->cartao;  ?> </td>
                  <td> R$ <?php echo number_format($value->valor_total, 2, ",", ".");  ?> </td>
                  <td> R$ <?php echo number_format($value->taxa_entrega, 2, ",", ".");  ?> </td>
                  <td> R$ <?php echo number_format($total, 2, ",", ".");  ?> </td>
                  <?php if ($value->situacao == "em andamento"  && $value->forma_entrega == "Entrega") : ?>

                    <td><a class="text-success" href="?pag=area_restrita/editar_pedido/<?php echo $value->id_pedido; ?>">Editar Pedido</a></td>

                  <?php elseif ($value->forma_entrega == "Retirada") : ?>

                    <td><a class="text-danger" href="?pag=area_restrita/delete_pedido_retirada/<?php echo $value->id_pedido; ?>">Excluir Pedido</a></td>

                  <?php endif ?>
                </tr>

              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td colspan="9" class="text-muted text-center"><strong>Não há pedido No
                    Momento!</strong></td>
              </tr>

            <?php endif ?>

          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
  



  
  <!-- jQuery -->
  <script src="<?= assets('adminlte/plugins/jquery/jquery.min.js')?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= assets('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= assets('adminlte/dist/js/adminlte.min.js')?>"></script>
  <!-- utilitários -->
  <script src="<?= assets('site/js/sweetalert2.all.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= assets('site/js/jquery.mask.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= assets('site/js/jquery.validate.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= assets('site/js/jquery.numeric.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= assets('site/js/main.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= assets('adminlte/dist/js/pages/dashboard3.js') ?>"></script>
  <?= $this->section('script') ?>
</body>
</html>
