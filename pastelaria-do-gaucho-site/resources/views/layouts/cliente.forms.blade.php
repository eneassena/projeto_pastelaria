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
    
                        <a class="navbar-brand h1 mb-0" href="?pag=home/index">
                            <img src="{{ asset('assets/image/logo.png') }}" alt="logo" width="30" height="30">
                        </a>
    
                        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
    
                        <div class="collapse navbar-collapse" id="navbarSite">
    
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link text-white" href="{{ url('') }}">Home</a></li>
                            </ul>
                        </div>
    
                    </nav>
                @show
            </header>

            
            <section>
                @yield('content')            
            </section>

        </main>
        
       
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/node_modules/jquery/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/java-script/default-project.js') }}"></script>
        <script src="{{ asset('assets/java-script/altera_texto.js') }}"></script>
    </body>
</html>