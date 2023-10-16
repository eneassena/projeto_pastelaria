<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= assets('assets/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= assets('assets/css/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= assets('assets/css/adminlte.min.css') ?>"> 
</head>
<body >
<!-- class="hold-transition login-page" -->

  <main>
    <?= $this->section('content') ?>
  </main>

<!-- jQuery -->
<script src="<?= assets('assets/js/jquery.min.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= assets('assets/js/sweetalert2.all.min.js'); ?>" type="text/javascript"></script> 

<!-- jquery mask -->
<script src="<?= assets('assets/jquery-mask/dist/jquery.mask.min.js'); ?>" type="text/javascript"></script>

<script src="<?= assets('assets/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= assets('assets/adminLte/dist/js/adminlte.min.js') ?>"></script>


<?php $this->section('script')?>
<script>

  $(document).ready(function() {
    let msg = '<?= isset($message) ? $message : '' ?>';
    if(msg){
      Swal.fire(msg);
    }

    const handleOnSubmit = (e) => {
      const form_login = e.target;
      if(form_login.admin_login.value === '' || form_login.admin_senha.value === ''){
        e.preventDefault();
        Swal.fire('formulário invalido');
      }
    }

    $("form#form_login_admin").on('submit', handleOnSubmit);    

    // mascara do formulário da pagina de editar bebida, pastel e peddio
    $(".money").mask('#.##0,00', {reverse: true});
  });
</script>

</body>
</html>
