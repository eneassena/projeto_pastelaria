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
            <header class="">
                @section('sidebar')
                    <!-- CABEÇARIO -->
                    <!-- --------------------- -->
                    <!-- Barra de navegação id="nav-menu" -->
    
                    <nav class="navbar navbar-expand-lg navbar-light bg-danger" id="nav-menu">
    
                        <a class="navbar-brand h1 mb-0" href="{{ url('area-restrita') }}">
                            <img src="{{ asset('assets/image/logo.png') }}" alt="logo" width="30" height="30">
                        </a>
    
                        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
    
                        <div class="collapse navbar-collapse" id="navbarSite">
    
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link text-white" href="{{ url('area-restrita') }}">Home</a></li>
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
            <section>
                @yield('content')            
            </section>
        </main>
        
       
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/popper.js/dist/umd/popper.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/java-script/jquery.numeric.min.js') }}"></script>
        <script src="{{ asset('assets/java-script/default-project.js') }}"></script>
        <script src="{{ asset('assets/java-script/altera_texto.js') }}"></script>
        <script src="{{ asset('assets/java-script/area_restrita.js') }}"></script>
    </body>
</html>