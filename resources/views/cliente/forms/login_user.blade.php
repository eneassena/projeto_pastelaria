@extends('layouts.cliente_forms')
@section('title', 'Login')
@section('content')
@error('message')
    <div class="alert alert-info my-3">
        <span> <strong>{{$message}}</strong> </span>
    </div>
@enderror
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h1 class="text-muted text-center my-5">Painel Acesso</h1>
        </div>
    </div>
    <form class="row justify-content-center needs-validation" action="{{ url('login/auth') }}" method="post" novalidate>
        @csrf
        <div class="col-md-6 col-sm-12">
            <div class="form-floating mb-3">
                <!-- login -->
                <input type="text" class="form-control"
                    placeholder="Login do Usuário"
                    name="login" id="login" required
                />
                <label for="login">Login do Usuário</label>
            </div>

            <div class="form-floating mb-3">
                <!-- password -->
                <input type="password" class="form-control"
                    placeholder="Senha do Usuário"
                    name="password" id="password" required
                />
                <label for="password">Senha do Usuário</label>
            </div>

            <div class="col my-5"><hr class="border"></div>

            <div class="row justify-content-between m-0 p-0">
                    <a href="{{ url('create') }}" class="btn btn-outline-primary mb-2"><span>Cadastre-se</span></a>
                    <button type="submit" class="btn btn-outline-warning">Acessar</button>
            </div>
        </div>
    </form>
</div><!-- </div.container> -->
@endsection
