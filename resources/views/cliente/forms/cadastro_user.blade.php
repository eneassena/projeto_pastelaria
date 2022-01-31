@extends('layouts.cliente_forms')
@section('title', 'Cadastro')
@section('content')
@error('message')
    <div class="alert alert-info my-3">
        <span> <strong>{{$message}}</strong> </span>
    </div>
@enderror
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-muted text-center my-5">Cadastre-se</h1>
            </div>
        </div>
        <form class="row justify-content-center" id="form_cadastro" action="{{ url('store') }}" method="POST" autocomplete='off' novalidate>
            @csrf
            <div class="col-md-6 col-sm-12">
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- nome -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Entre nome"
                                       required />
                                <label for="name">Nome</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- telefone -->
                            <div class="form-floating">
                                <input type="text" class="form-control" name="telefone" id="telefone"
                                       placeholder="(00) 00000-0000)" required />
                                <label for="telefone">Telefone</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- complemento -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="complemento" id="complemento"
                                       placeholder="Entre complemento" required />
                                <label for="complemento">complemento</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- numero -->
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="numero" id="numero" placeholder="Entre N°"
                                       required />
                                <label for="numero">numero</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- bairro -->
                            <div class="form-floating">
                                <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Entre bairro"
                                       required />
                                <label for="bairro">bairro</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <!-- login -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Entre usuário"
                               required />
                        <label for="login">login</label>
                    </div>

                    <!-- senha -->
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Entre password" required />
                        <label for="password">senha</label>
                    </div>
                </div>
                <div class="row justify-content-end align-items-center">

                    <div class="col-auto">
                        <span>Já tem <a href="{{ url('login') }}">conta</a></span>
                    </div>
                    <div class="col-auto">
                        <input type="submit" class="btn btn-outline-primary" value="Cadastrar">
                    </div>
                </div>
            </div>
        </form><!-- end.form-->
        <div class="my-5"></div>
</div>
@endsection
