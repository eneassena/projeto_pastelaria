 <?php $this->layout("_theme", ['title' => $title]); ?>


 <!-- formulario exibição dos pedidos feito -->
 <div class="container-fluid">

   <div class="row justify-content-center">
     <div class="col-sm-12 col-md-10 mt-5 table-responsive ">
       <!-- <h3 class="h3 text-center">Pedidos Enviados</h3> -->
       <h3 class="h3 text-center">Acompanhe seu Pedido</h3>
       <table class="table table-hover">

         <?php if (isset($messagem_pedido_invalido) && !empty($messagem_pedido_invalido)) : ?>
               <?php $this->start('script') ?>
               <script>
                   alert_cust('success', '', '<?= $messagem_pedido_invalido ?>', 2500);
               </script>
               <?php $this->stop() ?>
         <?php endif; ?>
         <thead class="bg-warning table-dark">
           <tr class="text-left">
             <th>#</th>
             <!-- <th scope="col">Nome</th> <!-- table: cliente.nome -->
             <th scope="col">Situação</th><!-- table: pedido.situacao -->
             <th scope="col">Forma Entrega</th>
             <!--table: pedido.forma_entrega -->
             <th scope="col">Sub-Total</th><!-- table: pedido.valor_total -->
             <th scope="col">Taxa Entrega</th><!-- table: pedido.taxa_entrega -->
             <th scope="col">Valor Total</th><!-- table: pedido.valor_total + pedido.taxa_entrega-->

             <?php if (isset($_SESSION['cliente'])) : ?>

               <th class="text-center" scope="col" colspan="2">Meu Pedido</th>

             <?php elseif (isset($_SESSION['cliente_comun'])) : ?>

               <th class="text-center" scope="col" colspan="2">Meu Pedido</th>

             <?php endif ?>

           </tr>
         </thead>

         <tbody class="text-left">

           <?php if (isset($messagem_pedido)) : ?>
                <?php $this->start('script') ?>
                   <script>
                       alert_cust('success', '', '<?= $messagem_pedido ?>', 3000);
                   </script>
               <?php $this->stop() ?>
           <?php endif ?>

           <?php if (valida_exibicao($registro_pedido)) : ?>
             <?php foreach ($registro_pedido as $field => $value) :?>

                 <?php if((int)$value->idUser == (int) $_SESSION['user_comun_id']):?>

                     <tr class="table-success" title="Seu Pedido">
                         <td >
                             <?php if (!is_null(user_load()) && (int)user_load()->detalhes->idUser == (int)$value->idUser) : ?>

                                 <a class="text-primary" href="#<?= url("pedido/detalhes/{$value->idUser}") ?>">
                                    <span><strong class="text-muted">Seu Pedido</strong></span>
                                 </a>
                             <?php else : ?>
                                 <span><strong class="text-muted">Seu Pedido</strong></span>
                             <?php endif ?>
                         </td>

                         <td> <?= $value->situacao; ?> </td>
                         <td> <?= $value->formaDeEntrega;  ?> </td>
                         <td> R$ <?= formata_precos((string)$value->subtotal); ?> </td>
                         <td> R$ <?= formata_precos((string)$value->taxaDeEntrega); ?> </td>
                         <td> R$ <?= formata_precos((string)$value->total); ?> </td>
                     </tr>
                 <?php else: ?>

                    <tr class="">
                         <td>
                             <?php if (!is_null(user_load()) && (int)user_load()->detalhes->idUser == (int)$value->idUser) : ?>

                                 <a class="text-primary" href="#<?= url("pedido/detalhes/{$value->idUser}") ?>">
                                     <span>#</span>
                                 </a>
                             <?php else : ?>
                                 <span>#</span>
                             <?php endif ?>

                        </td>
                         <td> <?= $value->situacao; ?> </td>
                         <td> <?= $value->formaDeEntrega;  ?> </td>
                         <td> R$ <?= formata_precos((string)$value->subtotal); ?> </td>
                         <td> R$ <?= formata_precos((string)$value->taxaDeEntrega); ?> </td>
                         <td> R$ <?= formata_precos((string)$value->total); ?> </td>
                     </tr>

                 <?php endif; ?>

             <?php endforeach ?>

           <?php else : ?>

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
