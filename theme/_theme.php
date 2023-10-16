<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= assets('assets/css/opcao.css') ?>">
    <link rel="stylesheet" href="<?= assets('assets/css/site/home.css') ?>">
    <link rel="stylesheet" href="<?= assets('assets/css/bootstrap.min.css') ?>">

    <link rel="shortcut icon" href="<?= assets('assets/image/favicon.ico') ?>" type="image/x-icon">

</head>

<body>
    <header>
        <nav class="main_nav">
            <?php if ($this->section('sidebar')) :
                echo $this->section('sidebar');
            else : ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-danger" id="nav-menu">
    
                    <div class="">
                      <a class="navbar-brand h1 mb-0" href="<?= url() ?>">
                          <img src="<?= assets('assets/image/logo.png') ?>" alt="" width="30" height="30">
                      </a>
                    </div>
    
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSite">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSite">
    
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a title="Home" class="nav-link text-white" id="homePage" href="<?= url(); ?>">Home</a></li>
                            <li class="nav-item"><a title="Sobre" class="nav-link text-white" id="sobrePage" href="<?= url('sobre'); ?>">Sobre</a></li>
                            <!-- <li class="nav-item"><a title="Cardápio" class="nav-link text-white" id="cardapioPage" href="<?= url('cardapio'); ?>">Cardápio</a></li>
                            </li> -->
                            <li class="nav-item"><a title="Ver Pedidos" class="nav-link text-white" id="verPedidoPage" href="<?= url('ver-pedido'); ?>">Lista Espera</a>
                            <li class="nav-item">
                                <a title="Fazer Pedido" class="nav-link text-white" id="pedidoPage" href="<?= url('pedido'); ?>">Cardápio</a>
                            </li>
    
                            <?php if (isset($_SESSION['admin'])) : ?>
                                <li class="nav-item">
                                    <a title="" class="nav-link text-white" href="<?= url(); ?>">Área Restrita</a>
                                </li>
                            <?php endif; ?>
                        </ul>
    
                        <!-- aqui entra formukario de login  -->
                        <!-- Button trigger modal -->
    
                        <?php if (isset($_SESSION['user_cliente'])) : ?>
                            <a href="<?= url('cliente/logout'); ?>" class="text-white logout">Terminar Sessão</a>
                        <?php else : ?>
                            <div class='test_login' data-toggle="modal" data-target="#exampleModalCenter">
                                <a id="btn_login" style="color: white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18" height="18">
                                        <path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z">
                                        </path>
                                    </svg> MINHA CONTA</a>
                            </div>
                        <?php endif ?>
                    </div>
    
                </nav>
    
                <!-- - DIV DE LOGIN ------------->
                <?php $this->insert('site/forms/form_login') ?>
            <?php endif; ?>
        </nav>
    </header>

    <main class="main_content">
        <?= $this->section('content'); ?>
    </main>

    <footer class="main_footer">
        <div class="mx-3">
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>

                <div class="col-sm-4 ">
                    <h3>Localização</h3>
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.947119876847!2d-38.42676308560361!3d-12.975234063396767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7161a4bb55b91cb%3A0xc9c0fb10c4a62ff0!2sR.%20Orlando%20Moscoso%2C%2025a%20-%20Boca%20do%20Rio%2C%20Salvador%20-%20BA%2C%2041706-840!5e0!3m2!1spt-BR!2sbr!4v1603934202993!5m2!1spt-BR!2sbr" width="100%" height="245" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>

                <div class="col-sm-4 mb-3">
                    <h3 class="h3 ml-1">Mapa Site</h3>
                    <div class="list-group text-center">
                        <a href="<?= url("") ?>" class="list-group-item list-group-item-action list-group-item-primary">Home</a>
                        <a href="<?= url("sobre") ?>" class="list-group-item list-group-item-action list-group-item-primary">Sobre</a>
                        <a href="<?= url("cardapio") ?>" class="list-group-item list-group-item-action list-group-item-primary">Cardápio</a>
                        <a href="<?= url("ver-pedido") ?>" class="list-group-item list-group-item-action list-group-item-primary">Pedido</a>
                        <a href="<?= url("pedido") ?>" class="list-group-item list-group-item-action list-group-item-primary">Ver Pedidos</a>
                    </div>
                </div>

                <div class="col-sm-4">
                    <h3 class="h3 my-2">Social</h3>
                    <div class="btn-group-vertical btn-block btn-group-lg" role="group">
                        <a class="btn btn-outline-danger" target="_blank" href="https://www.instagram.com/pastelariadogaucho10/?igshid=115ti8qoa8j7a"><i class="fa fa-instagram"></i>Instagram</a>
                    </div>

                    <h3 class="h3 mt-2">Contato</h3>
                    <div class="btn-group-vertical btn-block btn-group-lg" role="group">
                        <a class="btn btn-outline-success mb-2" target="_blank" href="https://api.whatsapp.com/send?phone=+5571987127084"><i class="fa fa-whatsapp"></i>Whatsapp</a>
                        <a href="tel:+557130372254" target="_blank" class="my-2 btn btn-outline-warning">Fixo</a>
                    </div>
                </div>

                <div class="col-12 funcion">
                    <h6 style="color: black; text-align: center;">Aberta de Segunda a Domingo, exceto Quarta e Quinta - 17
                        às 23h</h6>
                </div>

            </div>

        </div>
    </footer>

    <script src="<?= assets('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/jquery-mask/dist/jquery.mask.min.js'); ?>" type="text/javascript"></script>

    <script src="<?= assets('assets/js/sweetalert2.all.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/js/bootstrap.bundle.min.js'); ?>" type="text/javascript"></script>

    <script src="<?= assets('assets/js/site/cliente.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/js/site/home.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/js/site/pedido.js'); ?>" type="text/javascript"></script>
    <script src="<?= assets('assets/js/refresh.js'); ?>" type="text/javascript"></script>

    <?= $this->section('script'); ?>

</body>

</html>
