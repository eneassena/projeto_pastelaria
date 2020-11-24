<!-- formulario para adicionar novos pasteís -->


 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">

            <h1 class="h1 text-center mt-5 mb-3">Adicionar Bebida</h1>
            <form class="pt-3" action="?pag=area_restrita/finalizar_edicao_bebidas/<?php echo $dados_edicao_bebida[0]->id_bebida; ?>" method="POST" id="form_pedido_cliente_on"
                autocomplete='off'>
                
                <?php if(isset($dados_edicao_bebida)): ?>
                
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Tipo da Bebida</label>
                        <input type="text" class="form-control" value="<?php echo $dados_edicao_bebida[0]->tipo_bebida; ?>" required name="tBebida" id="tBebida"
                            placeholder="ex: água, suco, refrigerante, ceveja" />
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Sabor (opcional)</label>
                        <input type="text" class="form-control" value="<?php echo $dados_edicao_bebida[0]->sabor; ?>" name="cxSabor" id="cxSabor"
                            placeholder="especifico para sucos" />
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Fruta (opcional)</label>
                        <input class="form-control" type="text" value="<?php echo $dados_edicao_bebida[0]->fruto; ?>" name="inFruta" id="inFruta"
                            placeholder="especifico para sucos" />
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Quantidade em ML</label>
                        <input type="text" class="form-control" value="<?php echo $dados_edicao_bebida[0]->quantidade_ml; ?>" name="inQtd" id="inQtd" required
                            placeholder="ex: 1L, 500ML, 350ML, 2L" />
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-sm-12 col-md-12">
                        <label>Valor Unidade</label>
                        <input type="text" class="form-control" value="<?php echo $dados_edicao_bebida[0]->valor_unidade; ?>" name="inValorUnidade" id="inValorUnidade" required
                            placeholder="0,00" />
                    </div>

                </div>


                <div class="form-row">
                    <div class="col-sm-12 col-md-12">
                        <input class="btn btn-danger float-right" type="submit" name="btn_pedido"
                            value="Editar Bebida" />
                    </div>
                </div>

                <?php endif ?>
            </form>

        </div>

    </div>
</div>