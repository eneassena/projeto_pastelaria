


<div class="row justify-content-center mt-5">
  <div class="col-md-6 col-sm-12">

    <div class="login-box">
      <div class="login-logo">
        <a href="<?= url('area-restrita/login-admin') ?>"><b>Pastelaria</b>Login</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Faça login para iniciar sua sessão</p>

        <form action="<?= url('area-restrita/login-validate') ?>" method="post" id="form_login_admin">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuário Admin" name="user_login" id="user_login" />
            <div class="input-group-append">
              <div class="input-group-text"></div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Senha do Usuário" name="user_senha" id="user_senha" />
            <div class="input-group-append">
              <div class="input-group-text"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <a href="#">Criar Conta</a>
            </div>
            <!-- /.col -->

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">logar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>

      <!-- /.login-card-body -->
    </div>
  </div>
</div>