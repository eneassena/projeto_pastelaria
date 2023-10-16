 <?php $this->layout("admin/_theme", [
   'title' => $title,
   'user' => isset($user) ? $user : '',
     'message' => "pastel"
 ])  ?>
 
<?php if(isset($message)): ?>
  <div class="row">
    <div class="col alert alert-info">
      <?= $message?>
    </div>
  </div>
<?php  endif; ?>

 <!-- add bebidas -->
<div class="row justify-content-center">
    <div class="col-md-11 mt-5">

    <!-- Exibindo formulário para adicionar novas bebidas -->
    <div class="btn-group ml-3" role="group" aria-label="Exemplo básico">
      <a id="button_ativa_pastel" class="btn btn-warning text-bold">Adicionar Pastéis</a>
    </div>

    <!-- mostra os pastéis já cadastro -->      
    <div class="row "style="display:block;" id="table_pastel" >

      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title mt-3 mb-2">Pastéis</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 300px;">
            
            <table class="table table-head-fixed text-nowrap">
              <thead>
                  <tr class="text-center">
                  <th scope="col"></th>
                  <th scope="col">Sabor</th>
                  <th scope="col">Ingrediente</th>                  
                  <th scope="col">Valor Unitário</th>
                  <th scope="col" colspan="2" >Acoes</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($pastels) && count($pastels) > 0) :  foreach ($pastels as $field => $value) : ?>
                  <tr class="text-center">
                    <td><?= '';?></td>
                    <td><?= $value->saborDoPastel ?></td>
                    <td><?= empty($value->ingrediente) ? '...' : $value->ingrediente ?></td>
                    <td><?= formata_precos($value->valorUnitario) ?></td>
                    <td>
                        <a class="btn btn-outline-warning" href="<?= url("area-restrita/pastel-edit/$value->idCardapioPastel")?>">Editar</a>
                        <a class="btn btn-outline-danger" href="<?= url("area-restrita/pastel-remove/$value->idCardapioPastel") ?>">Remover</a>
                    </td>
                  </tr>
                <?php endforeach; else : ?>
                    <tr>
                    <td colspan="9" class="text-muted text-center"><strong>Não há pedido No
                        Momento!</strong></td>
                  </tr>
                <?php endif ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    
    <!-- Formulário de cadastro de novos pasteis -->
    <div class="row justify-content-center" id="form_pastel" style="display:none">
        <!-- formulario para adicionar novos pasteís -->
        <div class="col-sm-12">
          <h1 class="h1 text-center mt-5 mb-3">
            Adicionar Pastéis
          </h1>
         <form class="pt-3" action="<?php echo url('area-restrita/pastel-store') ?>" method="POST"
          id="form_pedido_cliente_on">
           <div class="form-row">
             <div class="form-group col-sm-12 col-md-12">
               <label>Pastel Sabor</label>
               <input type="text" class="form-control" name="saborDoPastel" id="pSabor" placeholder="pastel sabor" required />
             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-sm-12 col-md-12">
               <label>Ingrediente do Pastel</label>
               <input class="form-control" type="text" name="ingrediente" id="iIngred" placeholder="ingrediente 1, ingrediente 2, ingrediente 3 ..." required />
             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-sm-12 col-md-12">
               <label>Valor Unidade</label>
               <input type="text" class="form-control positive money"
                name="valorUnitario" id="sValor" 
               placeholder="0,00" required maxlength="5" />
             </div>

           </div>
           <div class="form-row">
             <div class="col-sm-12 col-md-12">
               <input class="btn btn-danger float-right" type="submit" name="btn_pedido" value="Adicionar Pastel" />
             </div>
           </div>
         </form>
        </div>
    </div>
  </div>
</div>
 <!-- JavaScript -->
 <?php $this->start('script') ?>
 <script>
   $(document).ready(function() {

    const active_add_product = (e) => {

      actions_automazed('table_pastel', 'form_pastel');
    }

    $("#button_ativa_pastel").on("click", active_add_product);

    $(".money").mask('#.##0,00', {reverse: true});

   });
 </script>
 <?php $this->stop() ?>