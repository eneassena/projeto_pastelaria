<?php $this->layout("clients/_layout", ['title' => $title]); ?>

<!-- exibe mensagens enviada do controller -->
<?php if (isset($message) && count($message)) : ?>

  <?php $this->start('script') ?>
  <script>
    alert_cust('<?= $message['cls'] ?>', '', '<?= $message['msg'] ?>', 3000);
  </script>

  <?php $this->stop() ?>

<?php endif; ?>

<?php $this->section('content') ?>
<!-- pagina home -->

<div class="row-col-12 bg-warning">

  <div>
    <img src="<?= assets('image/Originals/home.jpeg') ?>" alt="imagem-cesta-de-pastéis" title="imagem-cesta-de-pastéis" width="100%">
  </div>

</div>

<?php $this->insert('clients/fragmentos/home/home.cards.part') ?>