<?php $this->layout('admin/index', ['title' => $title]) ?>

<?php if (isset($detalhesPedido)) : ?>

    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12">
            <span class="d-block text-center my-5">
                <span class="d-block font-weight-bold text-muted" style="font-size: 25pt;">Informações de pedido do cliente</span>
                <b style="font-size: 18pt;border-bottom:1px solid rgb(0,0,0);" class="text-black-50" ><?= ucfirst($detalhesPedido->nomeCli) ?></b>
            </span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pastéis</h3>
                </div> <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 250px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Sabor Pastel</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($detalhesPedido->dataPasteis as $pastel):  ?>
                            <tr>
                                <td><?= $pastel->saborDoPastel ?></td>
                                <td><?= formata_precos($pastel->valorUnitario)  ?></td>
                                <td><?= $pastel->qtd_pastel ?></td>
                                <td><?= calcular_total_item($pastel->valorUnitario, $pastel->qtd_pastel) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <!-- /.card-body -->
            </div>
        </div>
    </div>

    <?php if (count($detalhesPedido->dataBebidas) >= 1) : ?>
        <hr class="border my-5">
        <!-- informações das bebidas escolhida pelo cliente -->
        <div class="row justify-content-center">
            <div class="col-md-10 colsm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bebidas</h3>
                    </div> <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead class="text-center">
                                <tr>
                                    <th>Tipo Bebida</th>
                                    <th>Unidade(ML/Lts)</th>
                                    <th>Preço</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php foreach ($detalhesPedido->dataBebidas as $bebida) : ?>
                                    <tr>
                                        <td><?= $bebida->tipo_bebida; ?></td>
                                        <td><?= $bebida->quantidadeEmMl; ?></td>
                                        <td><?= formata_precos($bebida->valorUnidade); ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div>
            </div>
        </div> <!-- /.row -->
    <?php endif; ?>

    <hr class="border my-5">

    <!-- exibição das informações do cliente -->
    <div class="row justify-content-center">

        <div class="col-sm-12 col-md-10">
            <h1 class="text-center mb-3 mt-3">Informações do cliente</h1>
            <form class="pt-3" action="<?= url('area-restrita/detalhes-pedido-store') ?>" method="POST" id="form_pedido_cliente_on" autocomplete='off' onsubmit="return false">
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Seu Nome</label>
                        <input value="<?= $detalhesPedido->nomeCli; ?>" type="text" class="form-control" name="cNome" id="nome" disabled />
                    </div>

                    <div class="form-group col-sm-6 col-md-5">
                        <label>Celular</label>
                        <input value="<?= $detalhesPedido->telefoneCli; ?>" class="form-control" type="text" name="cCelular" id="xCelular" disabled />
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Bairro</label>
                        <input value="<?= isset($detalhesPedido->bairroEndereco) ? $detalhesPedido->bairroEndereco : ''; ?>" class="form-control" type="text" name="cBairro" id="xBairro" <?= !isset($detalhesPedido->bairroEndereco) ? 'required' : 'disabled'; ?> />
                    </div>
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Número º</label>
                        <input value="<?= isset($detalhesPedido->numeroEndereco) ? $detalhesPedido->numeroEndereco : ''; ?>" type="number" class="form-control" name="cNumero" id="xNumero" <?= !isset($detalhesPedido->numeroEndereco) ? 'required' : 'disabled'; ?> />
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-12 col-md-10">
                        <label>Complemento</label>
                        <input value="<?= isset($detalhesPedido->complementoEndereco) ? $detalhesPedido->complementoEndereco : ''; ?>" type="text" class="form-control" name="cComp" id="xComp" <?= !isset($detalhesPedido->complementoEndereco) ? 'required' : 'disabled'; ?> />
                    </div>
                </div>

            </form>
        </div>
    </div>

    <hr class="border my-5">

    <!-- esta linha abaixo tera informação do pedido que será modifica pelo admin -->
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10">
            <h1 class="text-center mb-5">Informações do Pedido</h1>

            <form class="pt-3" action="<?= url('area-restrita/detalhes-pedido-store') ?>" method="POST" id="form_edita_pedido" autocomplete='off'>
                <input type="hidden" name="id_pedido" id="id_pedido" value="<?= $detalhesPedido->idPedidoPed ?>" />

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Sub Total</label>
                        <input value="<?= $detalhesPedido->subTotalPed ?>" type="text" class="form-control" disabled />
                    </div>

                    <div class="form-group col-sm-6 col-md-5">
                        <label>Forma Entrega</label>
                        <input value="<?= $detalhesPedido->formaEntregaPed; ?>" class="form-control" type="text" disabled />
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Data Pedido</label>
                        <input value="<?= $detalhesPedido->dataPed; ?>" type="text" class="form-control" disabled />
                    </div>

                    <div class="form-group col-sm-6 col-md-5">
                        <label for="inputEst">Forma Pagamento</label>

                        <select id="inputEst" class="form-control" required disabled>
                            <option selected value="$detalhesPedido->formaPagamento">
                                <?= $detalhesPedido->formaPagamentoPed ?>
                            </option>
                        </select>
                    </div>


                </div>
                <div class="form-row justify-content-center">
                    <!-- verificar este campo se foi enviado um valor do tipo float antes de inserir no banco-->
                    <div class="form-group col-sm-6 col-md-5">
                        <label>Taxa Entrega</label>
                        <?php if ($detalhesPedido->formaEntregaPed == "Retirada") : ?>
                            <input type="text" min="1" max="5" class="form-control money" name="taxa_entrega" id="taxa_entregaR" title="valores validos ex: 1.00, 5.00, 3 | valores invalidos ex: 1.50, 6.58, 2.99" disabled maxlength="5" placeholder="0.00" value="0,00" />
                        <?php else : ?>
                            <input type="text" name="taxa_entrega" id="taxa_entregaE" class="form-control money" value="<?= $detalhesPedido->taxaEntregaPed ?>" required placeholder="0,00" maxlength="5" />
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-sm-6 col-md-5">
                        <label for="forma_pag">Situação</label>
                        <select id="forma_pag" name="situacao" class="form-control" required>
                            <?php if ($detalhesPedido->situacaoPed == 'em andamento') : ?>
                                <option selected value="<?= $detalhesPedido->situacaoPed; ?>">
                                    Em andamento
                                </option>
                            <?php endif; ?>
                            <option value="Pedido Enviado">Pedido Enviado</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="col-sm-12 col-md-10 ">
                        <input class="btn btn-danger float-right" type="submit" name="btn_pedido" value="Editar Pedido" />
                    </div>
                </div>
            </form>

        </div>
    </div>
    <hr class="border my-5">

<?php else : ?>
    <div class="container mb-5">
        <div class="row-col-12">
            <div class="alert alert-warning">
                <h1>Falha ao carragar dados do pedido!</h1>
            </div>
        </div>
    </div>
<?php endif; ?>
