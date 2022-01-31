<?php if(isset($messagem_add_pastel)):?> 
<?php echo $messagem_add_pastel; ?> 
<?php endif ?> 
<div class="container">
    <div class="row justify-content-center">
        <!-- formulario para adicionar novos pasteís -->
        <div class="col-sm-6">

            <h1 class="h1 text-center mt-5 mb-3">Adicionar Pastel</h1>
            <form class="pt-3" action="?pag=area_restrita/finalizar_edicao_pastel/<?php echo $dados_edicao_pastel[0]->id_cardapio_card; ?>" method="POST" id="form_pedido_cliente_on"
                autocomplete='off'>
                <?php if(isset($dados_edicao_pastel)): ?>
                
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Pastel Sabor</label>
                        <input type="text" class="form-control" value="<?php echo $dados_edicao_pastel[0]->nome_card; ?>" name="pSabor" id="pSabor" placeholder="pastel sabor"
                            required />
                    </div>
                </div>

                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Ingrediente do Pastel</label>
                        <input class="form-control" type="text" value="<?php echo $dados_edicao_pastel[0]->ingrediente_card; ?>" name="iIngred" id="iIngred"
                            placeholder="ingrediente 1, ingrediente 2, ingrediente 3 ..." required />
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Valor Unidade</label>
                        <input type="text" class="form-control" name="sValor" value="<?php echo $dados_edicao_pastel[0]->valor_unidade_card; ?>" id="sValor" placeholder="0,00" required />
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-12">
                        <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                            value="Editar Pastel" />
                    </div>
                </div>
            <?php endif ?>
            </form>

        </div>

    </div>
</div>