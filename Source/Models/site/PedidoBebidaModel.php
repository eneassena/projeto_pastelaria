<?php


namespace Source\Models\site;

use CoffeeCode\DataLayer\DataLayer;

class PedidoBebidaModel extends DataLayer
{
    /** @var array[$attributes] */
    private $attributes = [ 'fk2_idPedido', 'fk1_idBebida', 'fk2_idDetalhesItemPedido' ];

    public function __construct()
    {
        parent::__construct('pedido_bebida', $this->attributes, 'idPedidoBebida');
    }

    /**
     * @param int[id_pedido]
     * @return array
     */
    public function get_items_pedido(int $id_pedido): array
    {
        $pedidoItems = array();
        $relacionamento_this = $this->find()->fetch(true);

        if ($relacionamento_this) {
            foreach ($relacionamento_this as $key => $value) {
                if ($value->fk2_idPedido == $id_pedido) {
                    $bebida = (new BebidaModel)
                        ->find("idBebida = :cod_bebida", "cod_bebida={$value->fk1_idBebida}")
                        ->fetch()
                        ->data();

                    $dth = (new DetalhesItemPedido())->findById((int)$value->fk2_idDetalhesItemPedido);

                    $obj = new \stdClass();
                    $obj->tipo_bebida = $bebida->tipoDaBebida . ' | ' . $bebida->sabor;
                    $obj->quantidadeEmMl = $bebida->quantidadeEmMl;
                    $obj->valorUnidade = $bebida->valorUnidade;
                    $obj->qtd = $dth->quantidadeItems;
                    $pedidoItems[] = $obj;
                }
            }
            return $pedidoItems;
        }
        return $pedidoItems;
    }

    /**
     * @param int[id_pedido]
     * @param array[$data]
     * @return void
     */
    public function cadastrarProduto(int $idPedido, array $data): void
    {
        $detalhes = new DetalhesItemPedido();
        $detalhes->quantidadeItems = $data['quantidadeItems'];
        $detalhes->total = $data['total'];
        $detalhes->save();

        $pedPast = new PedidoBebidaModel();
        $pedPast->fk2_idPedido = $idPedido;
        $pedPast->fk1_idBebida = $data['idBebida'];
        $pedPast->fk2_idDetalhesItemPedido = $detalhes->idDetalhesItemPedido;
        $pedPast->save();
    }


    /**
     * @param int[$idpedido]
     * @return void
     */
    public function addBebida(int $idpedido): void
    {
        $cart = getProdutos('bebida');
        foreach ($cart as $value) {
            $this->cadastrarProduto($idpedido, [
                'quantidadeItems' => $value['qtd'],
                'total' => $value['item']->valorUnidade * $value['qtd'],
                'idBebida' => $value['item']->idBebida
            ]);
        }
    }
}
