<?php $this->layout('clients/_layout', ['title' => $title]); ?>

<!-- corpo da pagina pedido  -->
<?php if (isset($message) && strlen($message)) : ?>
      <?php $this->start('script') ?>
      <script>
          alert_cust('info', '', '<?= $message ?>', 1000);
      </script>
      <?php $this->stop() ?>
<?php endif ?>

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
          <ul class="list-group ">
            <li class="list-group-item text-dark border" id="liPastel">Pastel</li>
            <li class="list-group-item text-dark border" id="liBebida">Bebidas</li>
            <?php if(inFuncionamento()): ?>
            <li class="list-group-item text-dark border" id="liDados_Cliente">Dados do Cliente</li>
            <?php endif; ?>
          </ul>
        </div>

        <!-- conteudo de formularios -->
        <div class="col-sm-9">

            <!-- exibe modal de bairros de entrega da pastelaria -->
          <?php $this->insert('clients/fragmentos/pedido/bairros.entrega.part', ['localizacao' => $localizacao]) ?>

          <!-- exibe o icone de carrinho além dos produtos adicionados -->
          <?php $this->insert('clients/fragmentos/pedido/carrinho.part', [
            'cardapios' => $cardapios, 'bebidas' => $bebidas, 'message' => $message
          ]) ?>

        <!-- Tabela de Pasteis -->
        <?php $this->insert('clients/fragmentos/pedido/pastel.part', ['cardapios' => $cardapios, 'bebidas' => $bebidas])  ?>

        <!-- Tabela de bebidas -->
        <?php $this->insert('clients/fragmentos/pedido/bebida.part', ['cardapios' => $cardapios, 'bebidas' => $bebidas])  ?>

        <!-- formulario dados do cliente -->
        <?php $this->insert('clients/fragmentos/pedido/dados.cliente.part', [ 'user' => isset($user) || !is_null($user) ? $user : null ]) ?>
    </div>
  </div>

</div>

</div>
