@extends('layouts.cliente')


@section('title', "Cardápio")

@section('content')
   <!-- corpo da pagina pedido  -->

<div class="container">

    <div class="row my-5">

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark ">Tempo de Entraga 15 - 60 minutos</span>
        </div>

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark">Taxa de Entraga 2 - 15</span>
        </div>

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark">Forma de Entrega</span>
            <span>Delivery ou Retirada</span>
        </div>

        <div class="col-sm-3 col-md-3 p-3">
            <span class="text-dark">Funcionamento 17H a 23H</span>
        </div>

    </div> <!-- fim do container 1-->

    <div class="row justify-content-end">
        <div class="col-auto">
            <span style="text-shadow: 3px 3px 10px rgba(0,0,0,0.7)" class="mx-3 text-muted">
                Aberta de Segunda a Domingo, exceto Quarta e Quinta.
            </span>
        </div>
    </div>


<hr class="border">

<!-- -------------------------------------------------------------------------------------- -->

<section class="row justify-content-between">
    <!-- lista de informações -->
    <section class="col-lg-3 col-md-3 col-sm-3">
        <ul class="list-group">
            <li class="list-group-item text-dark border" id="liPastel">Pastel</li>
            <li class="list-group-item text-dark border" id="liBebida">Bebidas</li>
            <li class="list-group-item text-dark border" id="liDados_cliente">Dados do Cliente</li>
        </ul>
    </section>


    <!-- conteudo de formularios -->
    <section class="col-lg-9 col-md-9 col-sm-9">

        <div class="row justify-content-between mb-5">
            <!-- Modal Bairros -->
            @includeIf('cliente.fragmentos.cardapio.bairro')
            <!-- Modal Cart -->
            @includeIf('cliente.fragmentos.cardapio.carrinho')
        </div><!-- fim dos modals -->

        <!-- adicionar pastel no carrinho de sessao -->
        @includeIf('cliente.fragmentos.cardapio.pastel', [
            'cardapios' => isset($cardapios) ? $cardapios : []
        ])
        <!-- adicionar bebidas ao carrinho -->
        @includeIf('cliente.fragmentos.cardapio.bebida', [
            'bebidas' => isset($bebidas) ? $bebidas : []
        ])
        <!-- dados do cliente -->
        @includeIf('cliente.fragmentos.cardapio.dados_cliente', [
            'localizacao' => isset($localizacao) ? $localizacao : []
        ])
    </section>
</section>
@endsection
