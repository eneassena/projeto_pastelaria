@extends('layouts.cliente_forms')


@section('title', 'Login')

@error('message')
    <div class="alert alert-info">
        {{ $message }}
    </div>
@enderror

@section('content')
<div class="container">
    <div class="row-12">
        <h1 class="text-muted text-center my-5">Painel Acesso</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ url('login/auth') }}" method="post">
        @csrf
        <div class="row justify-content-center mb-3">
            <div class="col-md-6 col-sm-12">
                <!-- login -->
                <div class="form-floating">
                    <input type="text" class="form-control"
                    name="login" id="login"
                    placeholder="Entre usuário"
                    required
                    />
                    <label for="login">Login do Usuário</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-md-6 col-sm-12">
                <!-- password -->
                <div class="form-floating">
                    <input type="text" class="form-control"
                    name="password" id="password"
                    placeholder="(00) 00000-0000)"
                    required
                    />
                    <label for="password">Senha do Usuário</label>
                </div>
            </div>
        </div>

        <div class="row justify-content-evenly">
            <div class="col-auto">
                <a href="{{ url('create') }}" class="btn text-primary"><span>Cadastre-se</span></a>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-outline-warning">Acessar</button>
            </div>
        </div>
    </form>
        </div>
    </div>


</div><!-- </div.container> -->

@endsection
