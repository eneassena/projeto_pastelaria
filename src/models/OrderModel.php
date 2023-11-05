<?php


namespace Src\models;

use CoffeeCode\DataLayer\DataLayer;
use Src\service\StoreService;
 
use stdClass;

class OrderModel extends DataLayer
{

  /** @var User[$user] */
  private static $user = null;
  
  /**
   * atributo responsavel por armazenar detalhes de um pedido
   * */
  public $detalhes = null;

  private $attributes = ['formaDeEntrega', 'dataDoPedido', 'fk1_idFormaPag', 'fk1_user_id'];

  public function setUser(User $user): void
  {
    self::$user = $user;
  }

  public function getUser(): User|null
  {
    return self::$user;
  }


  public function __construct()
  {
    parent::__construct('pedido', $this->attributes, 'idPedido');
  }

  /**
   * @return array
   */
  public function ver_pedido(): array
  {
    $data = array();
    $pedidos = $this->find("situacao=:sit", "sit=" . 'em andamento')->fetch(true);

    if ($pedidos) {
      foreach ($pedidos as $key => $value) {
        $cliente_pedido = (new User)
          ->find("idUser = :idUser", "idUser={$value->data()->fk1_user_id}")
          ->fetch();

        $forma_pagamento = (new FormaPagamentoModel())
          ->find("idFormaPag = :cod_pedido", "cod_pedido={$value->data()->fk1_idFormaPag}")
          ->fetch();
        if ($value->dataDoPedido == date('Y-m-d') && $value->situacao == 'em andamento') {
          $pedidoItem = new stdClass();
          $pedidoItem->idPedido = $value->data()->idPedido;
          $pedidoItem->idUser = $cliente_pedido->data()->idUser;
          $pedidoItem->nome = $cliente_pedido->data()->nome;
          $pedidoItem->situacao = $value->data()->situacao;
          $pedidoItem->formaDeEntrega = $value->data()->formaDeEntrega;
          $pedidoItem->tipoDoPagamento = $forma_pagamento->data()->tipoDoPagamento;
          $pedidoItem->subtotal = $value->data()->valorTotal;
          $pedidoItem->taxaDeEntrega = $value->data()->taxaDeEntrega;
          $pedidoItem->total = ($value->data()->taxaDeEntrega + $value->data()->valorTotal);
          $data[] = $pedidoItem;
        }
      }
    }

    return $data;
  }

  /**
   * @param array[$data]
   * @return OrderModel
   */
  public function createNew(array $data): OrderModel
  {
    if (isset($data) && isset($data['idUser']) && empty($data['idUser'])) {
      if ($data['forma_entrega'] == "Entrega") {
        if (
          !$data['bairro'] || !$data['numero'] || !$data['complemento'] ||
          !$data['nome'] || !$data['telefone']
        ) {

          $this->success = false;
          return $this;
        }
        $this->setUser((new User)->create_user_comun([
          'nome' => $data['nome'],
          'telefone' => $data['telefone'],
          'tipoUsuario' => 'comun'
        ])->create_endereco_user([
          'bairro' => $data['bairro'],
          'numero' => $data['numero'],
          'complemento' => $data['complemento']
        ]));
      }

      if ($data['forma_entrega'] == "Retirada") {
        if (!$data['nome'] || !$data['telefone']) {
          $this->success = false;
          return $this;
        }

        $this->setUser((new User)->create_user_comun([
          'nome' => $data['nome'],
          'telefone' => $data['telefone'],
          'tipoUsuario' => 'comun'
        ]));

        $this->getUser()->save();
      }
    }

    if (isset($data['idUser']) && !empty($data['idUser'])) {
      $this->setUser(new User);
      $this->getUser()->idUser = (int) $data['idUser'];
    }

    $forma = (new FormaPagamentoModel())->formaPagamento($data['forma_pagamento']);

    $this->valorTotal     = StoreService::calc_total();
    // $this->valorTotal     = $data['valor_total'];
    $this->formaDeEntrega = $data['forma_entrega'];
    $this->dataDoPedido   = date('Y/m/d');
    $this->fk1_user_id    = $this->getUser()->idUser;
    $this->fk1_idFormaPag = $forma->data()->idFormaPag;
    $this->success = $this->save();

    $_SESSION['user_comun_id'] = $this->getUser()->idUser;

    (new OrderPastelModel)->addPastel($this->idPedido);

    if (count(getProdutos('bebida')) != 0) (new PedidoBebidaModel)->addBebida($this->idPedido);

    return $this;
  } // end metodo items_do_pedido()

  /**
   * metodo busca retorna informações do pedido com mais detalhes
   * @return OrderModel
   * */
  public function buscarPedidoDetalhado(): OrderModel
  {
    $userPedido = $this->showUser($this->fk1_user_id);
    $forma_pagamento = $this->formaDePagamento((int)$this->fk1_idFormaPag);
    $items_pastel = $this->buscarPastel();
    $items_bebida = (new PedidoBebidaModel)->get_items_pedido($this->idPedido);
    $enderecoCliente = (new EnderecoUserModel)->buscarEndereco($this->fk1_user_id);

    $this->detalhes = new stdClass();
    // cliente
    $this->detalhes->idUserCli               = $userPedido->idUser;
    $this->detalhes->nomeCli                 = $userPedido->nome;
    $this->detalhes->telefoneCli             = $userPedido->telefone;

    if ($this->formaDeEntrega == "Entrega" && $enderecoCliente) {
      $this->detalhes->bairroEndereco      = $enderecoCliente->bairro;
      $this->detalhes->complementoEndereco = $enderecoCliente->complemento;
      $this->detalhes->numeroEndereco      = $enderecoCliente->numero;
    }
    // caixa pedido
    $this->detalhes->idPedidoPed             = $this->idPedido;
    $this->detalhes->formaEntregaPed         = $this->formaDeEntrega;
    $this->detalhes->situacaoPed             = $this->situacao;
    $this->detalhes->dataPed                 = $this->dataDoPedido;
    $this->detalhes->taxaEntregaPed          = $this->taxaDeEntrega;
    $this->detalhes->subTotalPed             = $this->valorTotal;
    $this->detalhes->valorTotalPed           = ($this->valorTotal + $this->taxaDeEntrega > 0 ? $this->taxaDeEntrega : 0);
    $this->detalhes->formaPagamentoPed       = $forma_pagamento->tipoDoPagamento;
    // items
    $this->detalhes->dataPasteis             = $items_pastel;
    $this->detalhes->dataBebidas             = $items_bebida;
    $this->success = true;
    return $this;
  }

  /**
   * buscar cliente de um pedido especifico pelo seu codigo
   * @param int[$idUser]
   * @return stdClass
   * */
  private function showUser(int $idUser): stdClass
  {
    $user = (new User)->findById($idUser);
    return $user ? $user->data() : new stdClass;
  }

  /**
   * Buscar forma de pagamento do pedido
   * @param int[$idFormaPag]
   * @return stdClass
   * */
  private function formaDePagamento(int $idFormaPag): stdClass
  {
    $formPag = (new FormaPagamentoModel())->findById($idFormaPag);
    return $formPag ? $formPag->data() : new stdClass;
  }

  /**
   * buscar items de um pedido aqui será o pastel
   * @return array
   * 
   * */
  private function buscarPastel(): array
  {
    return (new OrderPastelModel)
      ->get_items_pedido($this->idPedido);
  }

  /**
   * Metodo responsavel por alterar informações de um pedido
   * @param array[$data]
   * @return bool
   * */
  public function atualizarPedido(array $data): bool
  {

    if (in_array("", $data)) return false;

    if ($this->data()->formaDeEntrega == 'Retirada') {
      $this->situacao = $data['situacaoPedido'];
    }

    if ($this->data()->formaDeEntrega == 'Entrega') {
      $this->situacao = $data['situacaoPedido'];
      $this->taxaDeEntrega = $data['taxaEntregaPedido'];
    }
    return $this->save();
  }

 

} // end class
