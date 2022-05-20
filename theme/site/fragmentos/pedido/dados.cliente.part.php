<!-- formulario dados do cliente -->
<div class="row justify-content-center" id="divDadosCliente" style="display: none">
  <div class="col-md-12 col-sm-12">
    <!-- <h1 class="text-center mb-5">Informações do Cliente</h1> -->


    <?php if (valida_pastels('pastel')) : ?>
     
      <!-- condição responsavel por exibir em tela o formulario para o cliente -->
      <form class="pt-3" action="<?= url('pedido/caixa') ?>" method="POST" id="form_pedido_dados_cliente" autocomplete='off'>

        <input type="hidden" name='idUser' id="idUser" value="<?= isset(user_load()->detalhes) ? user_load()->detalhes->idUser : '' ?>" />

        <div class="form-row justify-content-center">
          <div class="form-group col-md-6 col-sm-12">
            <label>Seu Nome</label><span class="text-danger"> *</span>
            <input type="text" class="form-control"
                   value="<?= isset($user->detalhes->nome) ? $user->detalhes->nome : '' ?>"
                   name="nome" id="nome"
                   placeholder="Nome do Cliente"/>
          </div>

          <div class="form-group col-md-6 col-sm-12">
            <label for="telefone">telefone</label><span class="text-danger"> *</span>
            <input class="form-control" type="text"
                   value="<?= isset($user->detalhes->telefone) ? $user->detalhes->telefone : ''?>"
                   name="telefone" id="telefone" placeholder="ex: (00) 00000-0000" data-mask="(00) 00000-0000" />
          </div>
        </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-6 col-sm-12">
            <label for="bairro">Bairro</label>
            <input class="form-control" type="text"
                   value="<?= isset($user->detalhes->bairro) ? $user->detalhes->bairro : ''?>"
                   name="bairro" id="bairro" placeholder="Entre seu bairro" />
          </div>

          <div class="form-group col-md-6 col-sm-12">
            <label for="numero">Número º</label>
            <input type="number" class="form-control"
                   value="<?= isset($user->detalhes->numero) ? $user->detalhes->numero : ''?>"
                   name="numero" id="numro" placeholder="Entre N°" />
          </div>
        </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-6 col-sm-12">
            <label for="complemento" >Complemento</label>
            <input type="text" class="form-control"
                   value="<?= isset($user->detalhes->complemento) ? $user->detalhes->complemento : ''?>"
                   name="complemento" id="complemento" placeholder="ex: av, travessa, proxima a praça" />
          </div>

          <div class="form-group col-md-6 col-sm-12">
            <label for="forma_pagamento">Forma de pagamento <span class="text-danger"> *</span></label>
            <select id="forma_pagamento" name="forma_pagamento" class="form-control"
                <?= !true ? 'disabled' : 'required' ?> >
              <option selected value="">Escolha</option>
              <option value="Dinheiro">Dinheiro</option>
              <option value="Cartão">Cartão</option>
            </select>
          </div>
        </div>

        <div class="form-row ">
          <div class="form-group col-sm-12">
            <label>Escolha a forma de entrega do pedido</label>
          </div>

          <div class="form-check col-sm-2 ml-4">
            <input class="form-check-input" type="radio" name="forma_entrega" id="radio_retirada" value="Retirada" <?= true ? 'checked required' : '' ?> />
            <label class="form-check-label" for="radio_retirada">Retirada </label>
          </div>

          <div class="form-check col-sm-2 ml-4">
            <input class="form-check-input" type="radio" name="forma_entrega" id="radio_entrega" value="Entrega" <?= true ? 'required' : '' ?> />
            <label class="form-check-label" for="radio_entrega">Entrega</label>
          </div>
        </div>

        <div class="form-row justify-content-between">
          <div class="col-md-12 col-sm-12">
            <!-- name="btn_pedido"  -->
            <input class="btn btn-danger float-right" type="submit" value="Finalizar Pedido" />
          </div>
        </div>

      </form>
    <?php else : ?>
      <div class="alert alert-info" role="alert">
        <p class="text-center pt-2">
          Escolha um lanche para enviar seu pedido! <span class="text-danger"> *</span>
        </p>
      </div>
    <?php endif ?>
      <div class="alert alert-info my-3">
        É importante que antes de enviar seus pedido verificar no ícone do carrinho se os
        items adicionados estão correto, caso a quantidade de items adicionados não esteja
        como pediu você pode remover-lo clicando no link
        <span class="text-danger " style="text-decoration: underline;">Excluir</span>
        no menu ao seu lado esquerdo "Pastel" ou "Bebidas", para que seu pedido seja um pedido valido ele deve
        conter apartir de um numero minino de pasteis que sao 3 unidade.
      </div>
</div>
