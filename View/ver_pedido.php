
 <!-- formulario exibição dos pedidos feito -->
 <div class="container-fluid">



     <div class="row justify-content-center">
         <div class="col-sm-12 col-md-10 mt-5 table-responsive ">
             <h3 class="h3 text-center">Pedidos Enviados</h3>
             <table class="table table-hover">

                 <?php if(isset($messagem_pedido_invalido) && !empty($messagem_pedido_invalido)):?>
                 <div class="alert alert-success" role="alert">
                     <?php echo "<h5 class='text-center'>$messagem_pedido_invalido</h5>"; ?>
                 </div>
                 <?php endif; ?>
                 <thead class="bg-warning table-dark">
                     <tr class="text-left">
                         <th>#</th> 
                         <th scope="col">nome</th>
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

                 <tbody class="text-left">

                    <?php if(isset($messagem_pedido)): ?>
                        <h5 class="h5 text-muted ml-2"><?php echo $messagem_pedido; ?></h5>
                    <?php endif ?>
                    
                     <?php if(isset($registro_pedido) && count($registro_pedido) > 0): ?>

                     <?php foreach($registro_pedido as $field => $value): ?>
                     
                     <?php $total = 0;?>
                     
                     <?php $total = $value->valor_total + $value->taxa_entrega; // calculando vlaor total do pedido?>
                     
                        <tr>
                            <td></td>
                            <td> <?php echo $value->nome_cli; ?> </td> 
                            <td> <?php echo $value->situacao; ?> </td>
                            <td> <?php echo $value->forma_entrega;  ?> </td>
                            <td> R$ <?php echo number_format($value->valor_total,2, ",", ".");  ?> </td>
                            <td> R$ <?php echo number_format( $value->taxa_entrega, 2, ",", ".");  ?> </td>
                            <td> R$ <?php echo number_format($total,2, ",", ".");  ?> </td>
                        </tr>

                     <?php  endforeach ?>

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