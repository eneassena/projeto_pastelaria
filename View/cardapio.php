    <!-- corpo da pagina cardapio -->




    <div class="container mt-5">
        <h1 class="h1">Cárdapio Pastel</h1>
        <div class="row">
            <div class="col-sm col-md">

                <div class="row" id="div_pastel" style="display: flex;">
                    <div class="col-sm col-md table-responsive">
                        <table class="table table-hover">

                            <thead class="bg-warning table-dark">
                                <tr class="text-left">
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ingrediente</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>

                            <tbody class="text-left">
                                <?php if(isset($cardapio_pastel)): ?>
                                <?php if(count($cardapio_pastel) != 0): ?>
                                <?php foreach($cardapio_pastel as $cardapio): ?>

                                <tr>
                                    <td><?php echo $cardapio->nome; ?></td>
                                    <td><?php echo $cardapio->ingrediente; ?></td>
                                    <td><?php echo $cardapio->valor_unidade; ?></td>
                                </tr>

                                <?php endforeach ?>
                                <?php endif ?>
                                <?php  endif ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <hr class="border">
    </div>

    <div class="container">
        <h1 class="h1">Bebidas</h1>
        <div class="row">
            <div class="col-sm">

                <table class="table table-hover">

                    <thead class="bg-warning table-dark">
                        <tr>
                            <th class="text-left" scope="col">Tipo Bebida</th>
                            <th class="text-center" scope="col">Unidade(ML/Lts)</th>
                            <!-- <th scope="col">Sabor</th> -->
                            <th class="text-center" scope="col">Fruta</th>
                            <th class="text-center" scope="col">Preço</th>
                        </tr>
                    </thead>


                    <tbody class="text-center">
                        <?php if(isset($bebidas)): ?>
                        <?php if(count($bebidas) != 0): ?>
                        <?php foreach($bebidas as $bebida): ?>

                        <tr>
                            <td class="text-left"><?php echo $bebida->tipo_bebida; ?></td>
                            <td class="text-center"><?php echo $bebida->quantidade_ml; ?></td>
                            <!-- <td><?php //echo $bebida->sabor; ?></td> -->
                            <td class="text-center"><?php echo $bebida->fruto; ?></td>
                            <td class="text-center"><?php echo $bebida->valor_unidade; ?></td>
                        </tr>

                        <?php endforeach ?>
                        <?php endif ?>
                        <?php endif ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>