<?php $this->layout("_theme", ['title' => $title]); ?>

<div class="alert alert-danger">
  <h2>Oooooops erro <?= $error ?></h2>
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur doloremque, explicabo reprehenderit aliquam perspiciatis hic.</p>
</div>
<?php $this->start('sidebar'); ?>

<p class="text-center my-3">
  <a title="Voltar ao inicio" class=" btn btn-outline-danger" href="<?= url(); ?>">Voltar</a>
</p>

<?php $this->end(); ?>