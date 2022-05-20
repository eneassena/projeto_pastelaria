<?php $this->layout("_theme", ['title' => (isset($title) ? $title : '') ]); ?>


<div class="container">
  <div class="row justify-content-center" id="container_form_cad">
    <h1 class="text-muted text-center my-5">Cadastre-se</h1>

    <div class="col-sm-10 my-3 p-3">
      <form action="<?= url('cliente/cadastro/store') ?>" method="post" id="form_cadastro" autocomplete='off'>

        <div class="form-row">
          <!-- nome -->
          <div class="form-group col-sm-6">
            <label for="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Entre nome" required />
          </div>

          <!-- telefone -->
          <div class="form-group col-sm-6">
            <label for="">Telefone</label>
            <input type="text" class="form-control telefone_cliente" name="celular" id="celular" placeholder="(00) 00000-0000" required />
          </div>
        </div>

        <div class="form-row mt-3">
          <!-- complemento -->
          <div class="form-group col-sm-4">
            <label for="complemento">complemento</label>
            <input type="text" class="form-control" name="complemento" id="complemento" placeholder="Entre complemento" required />
          </div>
          <!-- numero -->
          <div class="form-group col-sm-4">
            <label for="numero">numero</label>
            <input type="number" class="form-control" name="numero" id="numero" placeholder="Entre N°" required maxLength="5" />
          </div>
          <!-- bairro -->
          <div class="form-group col-sm-4">
            <label for="bairro">bairro</label>
            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Entre bairro" required />
          </div>
        </div>

        <div class="form-row mt-3">
          <!-- login -->
          <div class="form-group col-sm-6">
            <label for="user_login">login</label>
            <input type="text" class="form-control" name="user_login" id="user_login" placeholder="Entre usuário" required />
          </div>

          <!-- senha -->
          <div class="form-group col-sm-6">
            <label for="uesr_senha">senha</label>
            <input type="password" class="form-control" name="user_senha" id="user_senha" placeholder="Entre password" required />
          </div>
        </div>

        <div class="form-row mt-3 justify-content-end">
          <div class="form-group col-sm-6">
            <?php if (isset($message) && strlen($message) != 0) : ?> 
              <?php $this->start('script') ?>
              <?php if ($message == 'success') : ?>
                <script>
                  alert_cust('<?= $message ?>', '', "Usuário cadastrado com sucesso!", 3000);
                </script>
              <?php else : ?>
                <script>
                  alert_cust('<?= $message ?>', '', "Preencha os campos corretamente!", 3000);
                </script>
              <?php endif; ?>
              <?php $this->stop() ?>
            <?php endif ?>

          </div>
          <div class="form-group col-sm-6">
            <input type="submit" class="float-right btn btn-primary cadastrar" value="Cadastrar">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
 