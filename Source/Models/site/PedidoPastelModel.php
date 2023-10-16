<?php


namespace Source\Models\site;

use CoffeeCode\DataLayer\DataLayer;

class PedidoPastelModel extends DataLayer
{
  /** @var array[$attributes] */
  private $attributes = [ 'fk1_idPedido', 'fk1_idCardapioPastel', 'fk1_idDetalhesItemPedido' ];

  public function __construct()
  {
    parent::__construct('pedido_pastel', $this->attributes, 'idPedidoPastel');
  }

  /**
   * buscar detalhes dos items dos pedido
   * pelo id data tb detalhes_item_pedido
   * @param int[$id]
   * @return DataLayer
   * */
  private function buscarDetalhesItemPedido(int $id): DataLayer
  {
    return (new DetalhesItemPedido())->findById($id);
  }

  /**
   * @param int[$id_pedido]
   * @return array
   */
  public function get_items_pedido(int $id_pedido): array
  {
    $pasteis_pedido = array();

    $relacionamento_this = $this->find()->fetch(true);
    
    if ($relacionamento_this) {
    
      foreach ($relacionamento_this as $key => $value) {
        if ($value->fk1_idPedido == $id_pedido) {
          $pasteis = (new CardapioPastelModel())->find("idCardapioPastel = :cod_pastel", "cod_pastel={$value->fk1_idCardapioPastel}")
            ->fetch()->data();
          $dth = $this->buscarDetalhesItemPedido((int)$value->fk1_idDetalhesItemPedido)->data();
          $obj = new \stdClass();
          $obj->saborDoPastel = $pasteis->saborDoPastel;
          $obj->valorUnitario = $pasteis->valorUnitario;
          $obj->qtd_pastel = $dth->quantidadeItems;
          $pasteis_pedido[] = $obj;
        }
      }
    }
    return $pasteis_pedido;
  }
  
  /**
   * @param int[idPedido]
   * @param array[$data]
   * @return void
   */
  public function cadastrarProduto(int $idPedido, array $data): void
  {
    $detalhes = new DetalhesItemPedido();
    $detalhes->quantidadeItems = $data['quantidadeItems'];
    $detalhes->total = $data['total'];
    $detalhes->save();

    $pedPast = new PedidoPastelModel();
    $pedPast->fk1_idPedido = $idPedido;
    $pedPast->fk1_idCardapioPastel = $data['idCardapioPastel'];
    $pedPast->fk1_idDetalhesItemPedido = $detalhes->idDetalhesItemPedido;
    $pedPast->save();
  }

  /**
   * @param int[$idPedido]
   * @return void
   */
  public function addPastel(int $idpedido): void
  {
    $cart = getProdutos('pastel');

    foreach ($cart as $value) {

      $this->cadastrarProduto($idpedido, [
        'quantidadeItems' => $value['qtd'],
        'total' => $value['item']->valorUnitario * $value['qtd'],
        'idCardapioPastel' => $value['item']->idCardapioPastel
      ]);
      
    }
  }
}
