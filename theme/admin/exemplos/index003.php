<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="<?= url('/public/css/opcao.css'); ?>">
  <link rel="stylesheet" href="<?= url('/public/css/bootstrap.css'); ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <nav class="main_nav">
    <?php if ($this->section('sidebar')) :
      echo $this->section('sidebar');
    else : ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-danger" id="nav-menu">
        <a class="navbar-brand h1 mb-0" href="#<?= url('area-restrita') ?>">
          <img src="<?= assets('image/logo.png') ?>" alt="logo" width="30" height="30">
        </a>
      </nav>

      <!------------- DIV DE LOGIN------------->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title h5 text-center" id="exampleModalLongTitle">Faça seu login ou cadastre-se para
                fazer pedidos de forma mais rápida</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span><!-- &times; -->
              </button>
            </div>

            <div class="modal-body">
              <div class="row justify-content-center">
                <form action="<?= url('cliente/check-login') ?>" method="POST" autocomplete='off' id="login-app" onsubmit="return validate()">
                  <div class="form-row">
                    <div class="form-group col-sm-12">
                      <label>Usuário</label>
                      <input type="text" class="form-control" name="cUser" id="xIdUser" placeholder="Entre usuário" />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-sm-12">
                      <label>Password</label>
                      <input type="password" class="form-control" name="cPass" id="xIdPass" placeholder="Entre password" />
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-sm-12">
                      <button class="btn btn-warning">Entrar</button>
                      <a href="<?= url('cliente/cadastro'); ?>" style="float: right;" class="text-muted mt-1">Fazer
                        Cadastro</a>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </nav>

  <main class="main_content">
    <?= $this->section('content'); ?>
  </main>




  <script src="<?= assets('/public/js/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?= assets('/public/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>
</body>

</html>