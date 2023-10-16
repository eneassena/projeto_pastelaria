<?php

namespace Source\Models\site;

use CoffeeCode\DataLayer\DataLayer;

class DetalhesItemPedido extends DataLayer
{

    public function __construct()
    {
        parent::__construct('detalhes_item_pedido', ['quantidadeItems', 'total'], 'idDetalhesItemPedido');
    }
}