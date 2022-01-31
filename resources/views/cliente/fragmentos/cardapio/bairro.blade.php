<div class="col-auto">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-warning mt-2 ml-3" data-bs-toggle="modal"
        data-bs-target="#staticBackdrop">
        Bairros de entrega
    </button>
</div>
<!-- Modal Bairros -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Bairro de entrega da pastelaria</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- modal exibindo informações do pastel que vem do carrinho pastel -->
                <h1 class="h6">Bairros de entrega:</h1>
                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead class="bg-warning text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Bairro</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($localizacao))
                        @foreach($localizacao as $bairroValue)
                        <tr>
                            <td>#</td>
                            <td> {{ $bairroValue->bairro }} </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center mt-3">
                                <span>{{"ainda não há bairro de entrega cadastrado!"}}</span>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
