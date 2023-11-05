<?php $this->layout("admin/_theme", [
  'title' => $title,
  'user' => isset($user) ? $user : '',
    'message' => "bebida"
]) ?>
 
<?php  if(isset($message)): ?>
  <div class="row">
    <div class="col-sm-12 alert alert-info">
      <span class="text-white"><?= $message ?></span>
    </div>
  </div>
<?php endif; ?>



<!-- add bebidas -->
<div class="row justify-content-center">
    <div class="col-md-11 mt-5">

      <!-- Exibindo formulário para adicionar novas bebidas -->
      <div class="btn-group ml-3" role="group" aria-label="Exemplo básico">
        <a id="button_ativa_bebida" class="btn btn-warning"><strong>Adicionar Bebida</strong></a>
      </div>

      <!-- mostra os pastéis já cadastro -->      
      <div class="row" id="table_bebida" style="display:block;" >

        <div class="col-12 mt-5">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title mt-3 mb-2">Bebidas Disponíveis</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              
              <table class="table table-head-fixed text-nowrap">
                <thead>
                    <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Tipo de bebida</th>
                    <th scope="col">Fruto</th>
                    <th scope="col">Quantidade(ML)</th>
                    <th scope="col">Preço</th> 
                    <th scope="col">Acoes</th> 
                  </tr>
                </thead>
                <tbody>

                  <?php if (isset($bebidas) && count($bebidas) > 0) : foreach ($bebidas as $field => $value) : ?>

                        <tr class="text-center">
                          <td></td>
                          <td> <?= $value->tipoDaBebida . ''. (!empty($value->sabor) ? ", ".$value->sabor : '') ?> </td>
                          <td> <?= $value->fruto ?></td>
                          <td> <?= $value->quantidadeEmMl  ?> </td>
                          <td> R$ <?= formata_precos($value->valorUnidade);  ?> </td>
                          <td>
                              <a href="<?= url("area-restrita/bebida-edit/$value->idBebida") ?>" class="btn btn-outline-warning">Editar</a>
                              <a href="<?= url("area-restrita/bebida-remove/$value->idBebida") ?>" class="btn btn-outline-danger">Remover</a>
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
      
      <!-- formulário para adicionar novas bebidas na loja -->
      <div class="row justify-content-center" id="form_bebida" style="display:none">
          <!-- formulario para adicionar novos pasteís -->
          <div class="col-sm-12">
            <div class="row-col">
              <h1 class="h1 text-center mt-5 mb-3">Adicionar Bebida</h1>
            </div>

            <form class="pt-3" action="<?= url('area-restrita/bebida-store')  ?>" method="POST" id="form_pedido_add_bebida" autocomplete='off'>
  
              <div class="form-row">

                <div class="form-group col-sm-12 col-md-12">
                  <label>Tipo da Bebida</label>
                  <input type="text" class="form-control" required name="tipoDaBebida" id="tBebida" placeholder="ex: água, suco, refrigerante, ceveja" />
                </div>
              </div>
              <div class="form-row">

                <div class="form-group col-sm-12 col-md-12">
                  <label>Sabor (opcional)</label>
                  <input type="text" class="form-control" name="sabor" id="cxSabor" placeholder="especifico para sucos" />
                </div>

              </div>
              <div class="form-row">

                <div class="form-group col-sm-12 col-md-12">
                  <label>Fruta (opcional)</label>
                  <input class="form-control" type="text" name="fruto" id="inFruta" placeholder="especifico para sucos" />
                </div>

              </div>
              <div class="form-row">

                <div class="form-group col-sm-12 col-md-12">
                  <label>Quantidade em ML</label>
                  <input type="text" class="form-control" name="quantidadeEmMl" id="inQtd" required placeholder="ex: 1L, 500ML, 350ML, 2L" />
                </div>

              </div>
              <div class="form-row">

                <div class="form-group col-sm-12 col-md-12">
                  <label>Valor Unidade</label>
                  <input type="text" class="form-control money" name="valorUnidade" id="inValorUnidade" required placeholder="0,00" maxlength="5" />
                </div>

              </div>
  
              <div class="form-row">
                <div class="col-sm-12 col-md-12">
                  <input class="btn btn-danger float-right" type="submit" name="btn_pedido" value="Adicionar Bebida" />
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

      actions_automazed('table_bebida', 'form_bebida');
    }

    $("#button_ativa_bebida").on("click", active_add_product);

    $(".money").mask('#.##0,00', {reverse: true});

   });
</script>
<?php $this->stop() ?>