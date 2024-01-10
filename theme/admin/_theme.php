<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= assets('assets/adminLte/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- IonIcons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= assets('assets/adminLte/dist/css/adminlte.min.css') ?>">

    <link rel="shortcut icon" href="<?= assets('assets/image/favicon.ico') ?>" type="image/x-icon">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= url('area-restrita') ?>" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= url('area-restrita') ?>" class="brand-link">
                <img src="<?= url('theme/assets/image/logo.png') ?>" alt="Pastelaria Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Pastelaria</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= url('theme/assets/adminLte/dist/img/user2-160x160.jpg') ?>"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">

                        <a href="#" class="d-block">Admin <?= isset($user) ? $user->nome : 'User' ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="<?= url('area-restrita') ?>" class="nav-link active">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class='fa fa-shopping-bag'></i>
                                <p>Minha Loja</p>
                            </a>
                            <ul class="nav nav-treeview" id="menu_esquerdo_dash">
                                <li class="nav-item">
                                    <!-- active-->
                                    <a href="<?= url('area-restrita/pedido') ?>" class="nav-link " id="pedido">
                                        <i class="far fa-circle nav-icon" style='font-size:26px'></i>
                                        <p>Pedidos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= url('area-restrita/pastel') ?>" class="nav-link" id="pastel">
                                        <i class="far fa-circle nav-icon" style='font-size:26px'></i>
                                        <p>Pastel</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= url('area-restrita/bebida') ?>" class="nav-link" id="bebida">
                                        <i class="far fa-circle nav-icon" style='font-size:26px'></i>
                                        <p>Bebida</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php if(isset($_SESSION['user_system'])):?>
                        <li class="nav-item">
                            <a href="<?= url('area-restrita/logout') ?>" class="nav-link">
                                <i class='fas fa-sign-out-alt' style='font-size:26px'></i>
                                <p>Logout</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->section('content') ?>

        </div>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
            <!-- To the right -->
            <!-- <div class="float-right d-none d-sm-inline"> Anything you want </div> -->
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="<?= url('area-restrita') ?>"
                    target="_blank">Pastelariadogaucho.com</a>.</strong> Todos os
            direitos
            preservados.
        </footer>
    </div>
    <!-- ./wrapper -->

    <script src="<?= assets('assets/adminLte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?= assets('assets/adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE -->
    <script src="<?= assets('assets/adminLte/dist/js/adminlte.min.js') ?>"></script>
    <!-- OPTIONAL SCRIPTS -->

    <script src="<?= assets('assets/js/sweetalert2.all.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/jquery-mask/dist/jquery.mask.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/js/main.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/adminLte/dist/js/pages/dashboard3.js') ?>"></script>
    <script src="<?= assets('assets/js/restrita/globals.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/js/refresh.js'); ?>" type="text/javascript"></script>
    <?= $this->section('script') ?>
    <script>
    $(function() {
        const activateClass = (ativo, noneActive1, noneActive2) => {
            $(ativo).addClass('active');
            $(noneActive1).removeClass('active');
            $(noneActive2).removeClass('active');
        }
        const tostring = (active) => {
            return `#${active}`;
        }
        let active = String('<?= isset($message) ? $message : '0' ?>');
        if (active) {
            switch (active) {
                case 'pedido':
                    activateClass(tostring(active), '#bebida', '#pastel');
                    break;
                case 'pastel':
                    activateClass(tostring(active), '#bebida', '#pedido');

                    break;
                case 'bebida':
                    activateClass(tostring(active), '#pastel', '#pedido');
                    break;
            }
        }
    });
    </script>
</body>

</html>