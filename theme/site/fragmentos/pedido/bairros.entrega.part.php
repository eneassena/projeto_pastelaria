  <!-- Bairros de entrega -->
  <div class="row justify-content-betweens">
    <button type="button" class="btn btn-warning mt-2 ml-3" data-toggle="modal" data-target="#staticBackdrop">
      Bairros de entrega
    </button>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">Bairro de entrega da pastelaria</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- modal exibindo informações do pastel que vem do carrinho pastel -->
            <h1 class="h6">Bairros de entrega:</h1>
            <table class="table table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Bairro</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($localizacao) && count($localizacao)) : ?>
                  <?php foreach ($localizacao as $valoresBairro) : ?>
                    <tr>
                      <td></td>
                      <td><?= $valoresBairro->nomeDoBairro ?></td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <tr>
                    <td colspan="5" class="text-center mt-3">
                      <?= "Ainda não há bairro de entrega cadastrado!"; ?>
                    </td>
                  </tr>
                <?php endif ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

  </div>