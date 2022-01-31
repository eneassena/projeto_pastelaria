@extends('layouts.cliente')


@section('title', "Lista de Espera")


@section('content')
     <!-- formulario exibição dos pedidos feito -->
 <div class="container">

<div class="row justify-content-center">
    <div class="col-sm-12 col-md-10 mt-5 table-responsive ">
        <h3 class="h3 text-center">Pedidos Enviados</h3>
        <table class="table table-hover">


            <thead class="bg-warning text-white">
                <tr class="text-center">
                    <th>#</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Forma Entrega</th>
                    <th scope="col">Sub-Total</th>
                    <th scope="col">Taxa Entrega</th>
                    <th scope="col">Valor Total</th>

                   <?php if(isset($_SESSION['cliente'])): ?>

                       <th class="text-center" scope="col" colspan="2">Meu Pedido</th>

                   <?php elseif(isset($_SESSION['cliente_comun'])): ?>

                       <th class="text-center" scope="col" colspan="2">Meu Pedido</th>

                   <?php endif ?>

                </tr>
            </thead>

            <tbody class="text-center">

                <?php if(!(isset($registro_pedido) && count($registro_pedido) > 0)): ?>
                    @foreach([1,2,3,4,5,6,7] as $num)
                    <tr>
                        <td>#{{$num}}</td>
                        <td>...</td>
                        <td>...</td>
                        <td> R$ 0.00</td>
                        <td> R$ 0.00</td>
                        <td> R$ 0.00</td>
                    </tr>
                    @endforeach
                <?php  else: ?>

                <tr>
                    <td colspan="10" class="text-center"><strong>Não há pedido No Momento!</strong></td>
                </tr>

                <?php endif ?>

            </tbody>

        </table>

        <div class="mt-5 pt-5 text-muted text-center">
            <span>
                <i>Pastelaria do Gaucho</i>: Caro cliente se a forma de entrega do seu pedido for "Entrega", seu pedido
                ficará em analise
                pela pastelaria que retorná o valor da "taxa de entrega", para que o valor final seja calculado
                corretamente, a pastelaria agradece sua atenção.
            </span>
        </div>
    </div>
</div>
</div>
@endsection
