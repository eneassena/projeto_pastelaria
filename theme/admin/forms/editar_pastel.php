<?php $this->layout('admin/index', ['title' => 'Edição de Pastel']) ?> 


<div class="row justify-content-center">

<!-- formulario para adicionar novos pasteís -->
<div class="col-sm-6">
  <h1 class="h1 text-center mt-5 mb-3">Editar Pastel</h1>
  <form class="pt-3" action="<?= url('area-restrita/pastel-store') ?>"
    method="POST" id="form_pedido_cliente_on">

    <input type="hidden" name="idCardapioPastel" id="idCardapioPastel" value="<?= $pastel->idCardapioPastel ?>">

    <div class="form-row">
      <div class="form-group col-sm-12 col-md-12">
        <label>Pastel Sabor</label>
        <input type="text" class="form-control" name="saborDoPastel" id="saborDoPastel"
        placeholder="pastel sabor" value="<?= $pastel->saborDoPastel ?>" />
      </div>
    </div>

    <div class="form-row">

      <div class="form-group col-sm-12 col-md-12">
        <label>Ingrediente do Pastel</label>
        <input class="form-control" type="text" name="ingrediente" id="ingrediente"
        placeholder="ingrediente 1, ingrediente 2, ingrediente 3 ..." 
        value="<?= $pastel->ingrediente ?>" />
      </div>

    </div>

    <div class="form-row">

      <div class="form-group col-sm-12 col-md-12">
        <label>Valor Unidade</label>
        <input type="text" class="form-control positive" name="valorUnitario"
        id="valorUnitario" placeholder="0,00"  maxlength="5"
        value="<?= $pastel->valorUnitario ?>" />
      </div>

    </div>

    <div class="form-row">
      <div class="col-sm-12 col-md-12">
        <input class="btn btn-danger float-right" type="submit" name="btn_edicao" value="Editar Pastel" />
      </div>
    </div>
  </form>
</div>

</div>