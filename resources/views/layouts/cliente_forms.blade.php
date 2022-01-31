<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Pastelaria - @yield('title')</title>

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('assets/node_modules/bootstrap/compiler/opcao.css') }}">
    </head>
    <body>


        <main class="main_site">
            <header class="">
                @section('sidebar')
                    <nav class="navbar navbar-expand-lg navbar-light bg-danger" id="nav-menu">
                        <div class="container">
                            <a class="navbar-brand h1 mb-0" href="#">
                                <img src="{{ asset('assets/image/logo.png') }}" alt="logo" width="30" height="30">
                            </a>

                            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSite">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSite">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('') }}">Voltar</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                @show
            </header>


            <section>
                @yield('content')
            </section>

        </main>

        <!-- Scrips -->
        <script src="{{ asset('assets\java-script\jquery\jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets\java-script\jquery\jquery.mask.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
        <script src="{{ asset('assets/java-script/cliente/validate.js') }}"></script>
    </body>
</html>
