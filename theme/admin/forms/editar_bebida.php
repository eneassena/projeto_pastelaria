<?php $this->layout('admin/index', ['title' => 'Edição de Pastel']) ?>


<div class="row justify-content-center" id="form_bebida" style="display:flex">
 
   <!-- formulario para adicionar novos pasteís -->
   <div class="col-sm-6">

      <h1 class="h1 text-center mt-5 mb-3">Adicionar Bebida</h1>
      <form class="pt-3" action="<?= url("area-restrita/bebida-store") ?>" method="POST" id="form_pedido_add_bebida" autocomplete='off'>
        <input type="hidden" name="id_bebida" id="id_bebida" value="<?= $bebida->idBebida ?>" />

        <div class="form-row">

        <div class="form-group col-sm-12 col-md-12">
          <label>Tipo da Bebida</label>
          <input type="text" class="form-control" required 
          name="tipo_bebida" id="tipo_bebida" placeholder="ex: água, suco, refrigerante, ceveja" 
          value="<?= $bebida->tipoDaBebida ?>" />
         </div>
       </div>
       <div class="form-row">

         <div class="form-group col-sm-12 col-md-12">
           <label>Sabor (opcional)</label>
           <input type="text" class="form-control" 
           name="sabor" id="sabor" placeholder="especifico para sucos" 
           value="<?= $bebida->sabor ?>"/>
         </div>

       </div>
       <div class="form-row">
         <div class="form-group col-sm-12 col-md-12">
           <label>Fruta (opcional)</label>
           <input class="form-control" type="text" 
           name="fruto" id="fruto" placeholder="especifico para sucos" 
           value="<?= $bebida->fruto ?>"/>
         </div>
       </div>
       <div class="form-row">
        <div class="form-group col-sm-12 col-md-12">
         <label>Quantidade em ML</label>
         <input type="text" class="form-control" 
         name="quantidadeEmMl" id="quantidadeEmMl" required placeholder="ex: 1L, 500ML, 350ML, 2L" 
         value="<?= $bebida->quantidadeEmMl ?>" />
        </div>
       </div>
       <div class="form-row">

         <div class="form-group col-sm-12 col-md-12">
           <label>Valor Unidade</label>
           <input type="text" class="form-control positive" 
           name="valor_unidade" id="valor_unidade" required placeholder="0,00" maxlength="5" 
           value="<?= $bebida->valorUnidade ?>" />
         </div>
       </div>

       <div class="form-row">
         <div class="col-sm-12 col-md-12">
           <input class="btn btn-danger float-right" type="submit" name="btn_pedido" 
           value="Editar Bebida" />
         </div>
       </div>
     </form>
   </div>
 </div>