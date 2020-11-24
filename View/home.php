<!-- pagina home -->
 


<div class="row-col-12 bg-warning borda-top">
    <?php if(isset($msg_acesso)): ?>
        <h6 class="h6 text-muted ml-2"><?php echo $msg_acesso; ?></h6>
    <?php endif ?>
    <img src="Media/image/Originals/home.jpeg" alt="imagem-cesta-de-pastéis" title="imagem-cesta-de-pastéis" width="100%">
</div>

<!-- Card -->
<div class="row justify-content-sm-center mx-0 pt-5 px-3" style="background-color: rgb(255, 210, 0);">
    <!-- col-md-4 -->

    <!-- Pastel Maravilha-->
    <div class="col-sm-6 col-md-4">
        <div class="card mb-5">

            <img src="Media/image/Originals/home.jpeg" alt="texto-alternativo" class="card-img-top">

            <div class="card-body">
                <h4 class="card-title">Pastel Maravilha</h4>
                <h6 class="cardsubtitle mb-2 text-muted">Frango, creme de leite e milho verde</h6>
                <p class="card-text text-justify">
                    Em um retiro espiritual da igreja, estavam as irmãs providenciando<span id="pontos_mar">...</span>
                    <span style="display:none" id="mais_mar">
                        o almoço da turma e, na hora de servir, uma irmã firou os olhos em mim na fila e, em um tom de
                        alegria,
                        disse: "Olha aí, Gaúcho, uma boa opção para seus pastéis!". Experimentei e gostei da ideia, mas
                        ainda
                        faltava um nome. Enquanto eu pensava, um louvor começou a tocar e uma frase impactou meu
                        coração: "é o
                        Deus das maravilhas operando, quem impedirá?". Surgiu assim o Pastel Maravilha, pois Deus fala
                        conosco
                        na simplicidade.
                    </span><a onclick="maravilha()" class="text-primary " id="btn_maravilha">Leia mais</a>
                </p>
            </div>

            <div class="card-body">
                <a href="?pag=pedido/index" class="card-link btn btn-warning">Pedir</a>
            </div>

        </div>
    </div>

    <!-- Pastel Joe-->
    <div class="col-sm-6 col-md-4">
        <div class="card mb-5">

            <img src="Media/image/Originals/home.jpeg" alt="zzzzzzz" class="card-img-top">

            <div class="card-body">
                <h4 class="card-title">Pastel Joe</h4>
                <h6 class="card-subtitle mb-2 text-muted">Frango, queijo, milho verde, ervilha e orégano</h6>

                <p class="card-text text-justify">
                    Um dia, um jovem vendedor de pastéis entrou na nossa pastelaria e pediu um pastel
                    <span id="pontos_joe">...</span>
                    <span style="display:none" id="mais_joe">
                        de frango com queijo. Ao degustar, ele elogiou muito a massa e o recheio e, na sinceridade do
                        seu coração, admitiu que, apesar
                        de vender, nunca havia comido um pastel tão gostoso. Sendo louco por milho, ervilha e orégano,
                        ainda
                        sugeriu o acréscimo desses ingredientes ao frango e o queijo, afirmando que tínhamos ganhado um
                        cliente. E foi dessa forma, em homenagem a esse jovem, que surgiu o Pastel Joe.
                    </span><a onclick="joe()" class="text-primary" id="btn_joe">Leia mais</a>
                </p>

            </div>

            <div class="card-body">
                <a href="?pag=pedido/index" class="card-link btn btn-warning">Pedir</a>
            </div>

        </div>
    </div>

    <!-- Pastel Biani-->
    <div class="col-sm-6 col-md-4">
        <div class="card mb-5">

            <img src="Media/image/Originals/home.jpeg" alt="zzzzzzz" class="card-img-top">

            <div class="card-body">
                <h4 class="card-title">Pastel Biani</h4>
                <h6 class="card-subtitle mb-2 text-muted">Queijo com Abaxi.</h6>
                <p class="card-text text-justify">
                    É um fato conhecido de todos que um leitor se distrairá com<span id="pontos_biani">...</span>
                    <span style="display:none" id="mais_biani">
                        o conteúdo de texto legível de uma página quando.
                    </span><a onclick="biani()" class="text-primary" id="btn_biani">Leia mais</a>
                </p>
            </div>

            <div class="card-body">
                <a href="?pag=pedido/index" class="card-link btn btn-warning">Pedir</a>
            </div>

        </div>
    </div>

    <!-- Pastel Dez -->
    <div class="col-sm-6 col-md-4">
        <div class="card mb-5">

            <img src="Media/image/Originals/home.jpeg" alt="zzzzzzz" class="card-img-top">

            <div class="card-body">
                <h4 class="card-title">Pastel Dez</h4>
                <h6 class="card-subtitle mb-2 text-muted">Queijo, presunto, tomate e orégano</h6>
                <p class="card-text text-justify">
                    Um cliente, ao olhar o cardápio atentamente,<span id="pontos_dez">...</span>
                    <span style="display:none" id="mais_dez">
                        gritou no meio do salão: "Ô Gaúcho, eu sou apaixonado
                        por queijo e presunto, mas se tu acrescentar tomate e orégano, vai ficar dez.". E assim surgiu o
                        Pastel Dez.
                    </span><a onclick="dez()" class="text-primary" id="btn_dez">Leia mais</a>
                </p>
            </div>

            <div class="card-body">
                <a href="?pag=pedido/index" class="card-link btn btn-warning">Pedir</a>
            </div>

        </div>
    </div>

    <!-- Pastel -->
    <div class="col-sm-6 col-md-4">
        <div class="card mb-5">

            <img src="Media/image/Originals/home.jpeg" alt="zzzzzzz" class="card-img-top">

            <div class="card-body">
                <h4 class="card-title">Pastel de Carne</h4>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text text-justify">
                    Um cliente, ao olhar o cardápio atentamente, gritou no meio do salão: "Ô Gaúcho, eu sou apaixonado<span id="pontos_carne">...</span>
                    <span style="display:none" id="mais_carne">
                         
                        por queijo e presunto, mas se tu acrescentar tomate e orégano, vai ficar dez.". E assim surgiu o
                        Pastel Dez.
                    </span><a onclick="carne()" class="text-primary" id="btn_carne">Leia mais</a>
                </p>
                <!-- <p class="card-text text-justify">
            É um fato conhecido de todos que um leitor se distrairá
          </p> -->
            </div>

            <div class="card-body">
                <a href="?pag=pedido/index" class="card-link btn btn-warning">Pedir</a>
            </div>

        </div>
    </div>

    <!-- Pastel -->
    <div class="col-sm-6 col-md-4">
        <div class="card mb-5">

            <img src="Media/image/Originals/home.jpeg" alt="zzzzzzz" class="card-img-top">

            <div class="card-body">
                <h4 class="card-title">Pastel de Salada</h4>
                <h6 class="card-subtitle mb-2 text-muted">Calabresa, Queijo mussarela, Batata, Cenoura</h6>
                <p class="card-text text-justify">
                    Um cliente, ao olhar o cardápio atentamente,<span id="pontos_salada">...</span>
                    <span style="display:none" id="mais_salada">
                        gritou no meio do salão: "Ô Gaúcho, eu sou apaixonado
                        por queijo e presunto, mas se tu acrescentar tomate e orégano, vai ficar dez.". E assim surgiu o
                        Pastel Dez.
                    </span><a onclick="salada()" class="text-primary" id="btn_salada">Leia mais</a>
                </p>
                <!-- <p class="card-text text-justify">
            É um fato conhecido de todos que um leitor se distrairá com
          </p> -->
            </div>

            <div class="card-body">
                <a href="?pag=pedido/index" class="card-link btn btn-warning">Pedir</a>
            </div>

        </div>
    </div>

</div>


<!-- area javascript basico -->
<script>
function carne() {
    let pontos = document.querySelector('#pontos_carne');
    let mais = document.querySelector('#mais_carne');
    let btn = document.querySelector('#btn_carne');


    if (pontos.style.display === "none") {
        pontos.style.display = 'inline';
        mais.style.display = 'none';
        btn.innerHTML = 'Leia mais';
    } else {
        pontos.style.display = 'none';
        mais.style.display = 'inline';
        btn.innerHTML = 'Leia menos';
    }
}


function salada() {

    let pontos = document.querySelector('#pontos_salada');
    let mais = document.querySelector('#mais_salada');
    let btn = document.querySelector('#btn_salada');

    if (pontos.style.display === "none") {
        pontos.style.display = 'inline';
        mais.style.display = 'none';
        btn.innerHTML = 'Leia mais';
    } else {
        pontos.style.display = 'none';
        mais.style.display = 'inline';
        btn.innerHTML = 'Leia menos';
    }
}
</script>