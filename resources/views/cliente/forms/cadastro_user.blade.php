@extends('layouts.cliente_forms')


@section('title', 'Cadastro')

@error('message')
    <div class="alert alert-info">
        {{ $message }}
    </div>
@enderror

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="text-muted text-center my-5">Cadastre-se</h1>

        <div class="col-sm-10 my-3 p-3">
            <form id="form_cadastro" action="{{ url('auth/store') }}" method="POST" autocomplete='off'>
                @csrf

                <div class="form-row">
                    <!-- nome -->
                    <div class="form-group col-sm-6">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Entre nome"
                            required />
                    </div>

                    <!-- telefone -->
                    <div class="form-group col-sm-6">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone"
                            placeholder="(00) 00000-0000)" required />
                    </div>
                </div>

                <div class="form-row mt-3">
                    <!-- complemento -->
                    <div class="form-group col-sm-4">
                        <label for="complemento">complemento</label>
                        <input type="text" class="form-control" name="complemento" id="complemento"
                            placeholder="Entre complemento" required />
                    </div>
                    <!-- numero -->
                    <div class="form-group col-sm-4">
                        <label for="numero">numero</label>
                        <input type="number" class="form-control" name="numero" id="numero" placeholder="Entre N°"
                            required />
                    </div>
                    <!-- bairro -->
                    <div class="form-group col-sm-4">
                        <label for="bairro">bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Entre bairro"
                            required />
                    </div>
                </div>

                <div class="form-row mt-3">
                    <!-- login -->
                    <div class="form-group col-sm-6">
                        <label for="login">login</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="Entre usuário"
                            required />
                    </div>

                    <!-- senha -->
                    <div class="form-group col-sm-6">
                        <label for="password">senha</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Entre password" required />
                    </div>
                </div>

                <div class="form-row mt-3 justify-content-end">
                    <div class="form-group col-sm-6">
                    <?php if(isset($boas_vindas)): ?>

                        <div class="alert alert-success">
                            <p class="text-center pt-3"><strong><?php echo $boas_vindas; ?></strong></p>
                        </div>

                    <?php elseif(isset($dados_incorreto)):?>
                        <div class="alert alert-danger">
                            <p class="text-center pt-1"><strong><?php echo $dados_incorreto; ?></strong></p>
                        </div>
                    <?php endif ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="submit" class="float-right btn btn-primary" value="Cadastrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
