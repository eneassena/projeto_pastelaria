<!-- Card -->
<div id="pastelcard" class="row gap-3 justify-content-sm-center mx-0 pt-5 " style="background-color: rgb(255, 210, 0);">
  <!-- col-md-4 -->


      <!-- Pastel Maravilha-->
      <div class="col-md-4 col-sm-12 context_box">
          <div class="card context_box_children">

              <img src="<?= assets('assets/image/Originals/home.jpeg') ?>" alt="texto-alternativo" class="card-img-top">
              <div class="card-body contextCard">
                  <h4 class="card-title">Pastel Maravilha</h4>
                  <h6 class="cardsubtitle mb-2 text-muted">Frango, creme de leite e milho verde</h6>
                  <div class="">
                      <p class="card-text text-justify">
                          Em um retiro espiritual da igreja, estavam as irmãs providenciando<span id="ler_menos_maravilha">...</span>
                          <span style="display:none" id="ler_mais_maravilha">
                                    o almoço da turma e, na hora de servir, uma irmã firou os olhos em mim na fila e, em um tom de
                                    alegria,
                                    disse: "Olha aí, Gaúcho, uma boa opção para seus pastéis!". Experimentei e gostei da ideia, mas
                                    ainda
                                    faltava um nome. Enquanto eu pensava, um louvor começou a tocar e uma frase impactou meu
                                    coração: "é o
                                    Deus das maravilhas operando, quem impedirá?". Surgiu assim o Pastel Maravilha, pois Deus fala
                                    conosco
                                    na simplicidade.
                                    </span>
                          <a class="text-primary " id="action_botao_maravilha">
                              leia mais
                          </a>
                      </p>
                  </div>

              </div>

              <div class="card-footer">
                 <div class="row">
                 <?php if (isset($_SESSION['user_cliente'])) : ?>
                      <a href="<?= url('pedido') ?>" class="card-link btn btn-warning">Pedir</a>
                  <?php else : ?>
                      <a id="maravilha_btn" title="Faça login para fazer um pedido" href="#" class="card-link btn btn-warning">Pedir</a>
                  <?php endif ?>
                 </div>
              </div>
          </div>
      </div>

        <!-- Pastel Joe-->
        <div class="col-md-4 col-sm-12 context_box">
        <div class="card context_box_children">

          <div class=""> 
            <img src="<?= assets('assets/image/Originals/home.jpeg') ?>" alt="zzzzzzz" class="card-img-top">
          </div>

          <div class="card-body contextCard">
            <h4 class="card-title">Pastel Joe</h4>
            <h6 class="card-subtitle mb-2 text-muted">Frango, queijo, milho verde, ervilha e orégano</h6>
              <div class="">
                <p class="card-text text-justify">
                  Um dia, um jovem vendedor de pastéis entrou na nossa pastelaria e pediu um pastel
                  <span id="ler_menos_joe">...</span>
                  <span style="display:none" id="ler_mais_joe">
                    de frango com queijo. Ao degustar, ele elogiou muito a massa e o recheio e, na sinceridade do
                    seu coração, admitiu que, apesar
                    de vender, nunca havia comido um pastel tão gostoso. Sendo louco por milho, ervilha e orégano,
                    ainda
                    sugeriu o acréscimo desses ingredientes ao frango e o queijo, afirmando que tínhamos ganhado um
                    cliente. E foi dessa forma, em homenagem a esse jovem, que surgiu o Pastel Joe.
                  </span><a class="text-primary" id="action_botao_joe">Leia mais</a>
                </p>
              </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <?php if (isset($_SESSION['user_cliente'])) : ?>
                <a href="<?= url('pedido') ?>" class="card-link btn btn-warning">Pedir</a>
              <?php else : ?>
                <a id="joe_btn" title="Faça login para fazer um pedido" href="#" class="card-link btn btn-warning">Pedir</a>
              <?php endif ?>
            </div>
          </div>

        </div>
      </div>

      <!-- Pastel Biani id="teste1",id="teste2" -->
      <div class="col-md-4 col-sm-12 context_box">
        <div class="card context_box_children">

          <img src="<?= assets('assets/image/Originals/home.jpeg') ?>" alt="zzzzzzz" class="card-img-top">
          <div class="card-body contextCard">
            <h4 class="card-title">Pastel Biani</h4>
            <h6 class="card-subtitle mb-2 text-muted">Queijo com Abaxi.</h6>
            <div class="">
                <p class="card-text text-justify">
                    É um fato conhecido de todos que um leitor se distrairá com<span id="ler_menos_biani">...</span>
                    <span style="display:none" id="ler_mais_biani"> o conteúdo de texto legível de uma página quando.
                    </span><a class="text-primary" id="action_botao_biani">Leia mais</a>
                </p>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
            <?php if (isset($_SESSION['user_cliente'])) : ?>
              <a href="<?= url('pedido') ?>" class="card-link btn btn-warning">Pedir</a>
            <?php else : ?>
              <a id="biani_btn" title="Faça login para fazer um pedido" href="#" class="card-link btn btn-warning">Pedir</a>
            <?php endif ?>
            </div>
          </div>

        </div>
      </div>

        <!-- Pastel Dez -->
        <div class="col-sm-12 col-md-4 context_box">
            <div class="card context_box_children">
                <img src="<?= assets('assets/image/Originals/home.jpeg') ?>" alt="zzzzzzz" class="card-img-top">

                <div class="card-body contextCard">
                    <h4 class="card-title">Pastel Dez</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Queijo, presunto, tomate e orégano</h6>
                    <div class="">
                        <p class="card-text text-justify">
                            Um cliente, ao olhar o cardápio atentamente,<span id="ler_menos_dez">...</span>
                            <span style="display:none" id="ler_mais_dez">
                        gritou no meio do salão: "Ô Gaúcho, eu sou apaixonado
                        por queijo e presunto, mas se tu acrescentar tomate e orégano, vai ficar dez.". E assim surgiu o
                        Pastel Dez.
                      </span><a class="text-primary" id="action_botao_dez">Leia mais</a>
                        </p>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                      <?php if (isset($_SESSION['user_cliente'])) : ?>
                          <a href="<?= url('pedido') ?>" class="card-link btn btn-warning">Pedir</a>
                      <?php else : ?>
                          <a id="dez_btn" title="Faça login para fazer um pedido" href="#" class="card-link btn btn-warning">Pedir</a>
                      <?php endif ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- Pastel Carne-->
        <div class="col-sm-12 col-md-4 context_box">
            <div class="card mb-5 context_box_children">

                <img src="<?= assets('assets/image/Originals/home.jpeg') ?>" alt="zzzzzzz" class="card-img-top">

                <div class="card-body contextCard">
                    <h4 class="card-title">Pastel de Carne</h4>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <div class="">
                        <p class="card-text text-justify">
                            Um cliente, ao olhar o cardápio atentamente,
                            gritou no meio do salão: "Ô Gaúcho, eu sou apaixonado
                            <span id="ler_menos_carne">...</span>
                            <span style="display:none" id="ler_mais_carne">
                            por queijo e presunto, mas se tu acrescentar tomate e orégano, vai ficar dez.". E assim surgiu o
                            Pastel Dez.
                            </span><a class="text-primary" id="action_botao_carne">Leia mais</a>
                        </p>
                    </div>
                </div>

                <div class="card-footer">
                   <div class="row">
                   <?php if (isset($_SESSION['user_cliente'])) : ?>
                        <a href="<?= url('pedido') ?>" class="card-link btn btn-warning">Pedir</a>
                    <?php else : ?>
                        <a id="carne_btn" title="Faça login para fazer um pedido" href="#" class="card-link btn btn-warning">Pedir</a>
                    <?php endif ?>
                   </div>
                </div>

            </div>
        </div>

        <!-- Pastel Salada-->
        <div class="col-sm-12 col-md-4 context_box">
            <div class="card context_box_children mb-5">

                <!-- image -->
                <img src="<?= assets('assets/image/Originals/home.jpeg') ?>" alt="zzzzzzz" class="card-img-top">

                <!-- body -->
                <div class="card-body contextCard">
                    <h4 class="card-title">Pastel de Salada</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Calabresa, Queijo mussarela, Batata, Cenoura</h6>
                    <div class="">
                        <p class="card-text text-justify">
                            Um cliente, ao olhar o cardápio atentamente, <span id="ler_menos_salada">...</span>
                            <span style="display:none" id="ler_mais_salada">
                            gritou no meio do salão: "Ô Gaúcho, eu sou apaixonado
                            por queijo e presunto, mas se tu acrescentar tomate e orégano, vai ficar dez.". E assim surgiu o
                            Pastel Dez.
                          </span><a  class="text-primary" id="action_botao_salada">Leia mais</a>
                        </p>
                    </div>
                </div>

                <!-- footer -->
                <div class="card-footer">
                    <div class="row">
                      <?php if (isset($_SESSION['user_cliente'])) : ?>
                          <a href="<?= url('pedido') ?>" class="card-link btn btn-warning">Pedir</a>
                      <?php else : ?>
                          <a id="salada_btn" title="Faça login para fazer um pedido" href="#" class="card-link btn btn-warning">Pedir</a>
                      <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
</div>