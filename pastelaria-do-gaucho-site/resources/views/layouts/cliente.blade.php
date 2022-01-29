<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Pastelaria - @yield('title')</title>
        <!-- main_footer_site -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/node_modules/bootstrap/compiler/layout.css') }}">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/node_modules/bootstrap/compiler/opcao.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/node_modules/bootstrap/compiler/bootstrap.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{ asset('assets/java-script/sweetalert2.all.min.js') }}" type="text/javascript"></script>
    </head>

         

    <body>
        <main class="main_site">
            <!-- -------HEADER-------------- -->
            <header class="main_header_site">
                @section('sidebar')
                    <!-- CABEÇARIO -->
                    <!-- --------------------- -->
                    <!-- Barra de navegação id="nav-menu" -->
                    
                    <nav class="navbar navbar-expand-lg navbar-light bg-danger" id="nav-menu">

                        <a class="navbar-brand h1 mb-0" href="?pag=home/index">
                            <img src="{{ asset('assets/image/logo.png') }}" alt="logo" width="30" height="30">
                        </a>

                        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSite">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSite">

                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link text-white" href="{{ url('') }}">Home</a></li>
                                <li class="nav-item"><a class="nav-link text-white" href="{{ url('sobre') }}">Sobre</a></li>
                                <li class="nav-item"><a class="nav-link text-white" href="{{ url('lista-de-espera') }}">Lista de Espera</a></li>
                                <li class="nav-item"><a class="nav-link text-white" href="{{ url('cardapio') }}">Cardápio</a></li>
                            </ul>

                            <!-- aqui entra formukario de login  -->
                            <!-- Button trigger modal -->
                            <div class="" data-toggle="modal" data-target="#exampleModalCenter">
                                <a style="color: black"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="18"
                                        height="18">
                                        <path fill-rule="evenodd"
                                            d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z">
                                        </path>
                                    </svg> MINHA CONTA</a>
                            </div>
                        </div>

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
                                        <form action="#{{ url('') }}" method="POST" autocomplete='off'>
                                            <div class="form-row">
                                                <div class="form-group col-sm-12">
                                                    <label>Usuário</label>
                                                    <input type="text" class="form-control" name="cUser" id="xIdUser"
                                                        placeholder="Entre usuário" />
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="cPass" id="xIdPass"
                                                        placeholder="Entre password" />
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-sm-12">
                                                    <button class="btn btn-warning">Entrar</button>
                                                    <a href="#{{ url('') }}" style="float: right;" class="text-muted mt-1">Fazer
                                                        Cadastro</a>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @show
            </header>

            <section class="main_body_site">
                @yield('content')
            </section>

            <footer class="main_footer_site">
                <div class="mx-3">
                    <div class="row">
                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-sm-4 ">
                            <h3>Localização</h3>
                            <div>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.947119876847!2d-38.42676308560361!3d-12.975234063396767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7161a4bb55b91cb%3A0xc9c0fb10c4a62ff0!2sR.%20Orlando%20Moscoso%2C%2025a%20-%20Boca%20do%20Rio%2C%20Salvador%20-%20BA%2C%2041706-840!5e0!3m2!1spt-BR!2sbr!4v1603934202993!5m2!1spt-BR!2sbr"
                                    width="100%" height="245" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>

                        <div class="col-sm-4 mb-3">
                            <h3 class="h3 ml-1">Mapa Site</h3>
                            <div class="list-group text-center">
                                <a href="{{ url('') }}" class="list-group-item list-group-item-action list-group-item-primary">Home</a>
                                <a href="{{ url('sobre') }}"
                                    class="list-group-item list-group-item-action list-group-item-primary">Sobre</a>
                                <a href="{{ url('lista-de-espera') }}"
                                    class="list-group-item list-group-item-action list-group-item-primary">Lista de Espera</a>
                                <a href="{{ url('cardapio') }}"
                                    class="list-group-item list-group-item-action list-group-item-primary">Cardápio</a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <h3 class="h3 my-2">Social</h3>
                            <div class="btn-group-vertical btn-block btn-group-lg" role="group">
                                <a class="btn btn-outline-danger" target="_blank"
                                    href="https://www.instagram.com/pastelariadogaucho10/?igshid=115ti8qoa8j7a"><i
                                        class="fa fa-instagram"></i>Instagram</a>
                            </div>

                            <h3 class="h3 mt-2">Contato</h3>
                            <div class="btn-group-vertical btn-block btn-group-lg" role="group">
                                <a class="btn btn-outline-success mb-2" target="_blank" href="https://api.whatsapp.com/send?phone=+5571987127084"><i
                                        class="fa fa-whatsapp"></i>Whatsapp</a>
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
        </main>
       
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/popper.js/dist/umd/popper.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/java-script/jquery.numeric.min.js') }}"></script>
        <script src="{{ asset('assets/java-script/default-project.js') }}"></script>
        <script src="{{ asset('assets/java-script/altera_texto.js') }}"></script>
    </body>
</html>