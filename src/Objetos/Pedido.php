<?php 

namespace Pastelaria\Objetos;


class Pedido {
    public $id_pedido = null;
    public $valor_total = null;
    public $situacao = null;
    public $data_pedido = null;
    public $taxa_entrega = null;
    public $forma_entrega = null;
    public $fk2_cliente_id = null;
}
 