<?php

namespace Src\controllers\cliente;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Source\Models\site\BebidaModel;
use Source\Models\site\CardapioPastelModel;
use Source\Models\site\LocalizacaoModel;
use Source\Service\LojaService;
use Source\Service\PedidoService;



class PedidoController extends Controller
{
  protected $lojaService = null;
  protected $title = "Pedido";

  public function __construct()
  {
    parent::__construct();
    $this->init();
  }

  /**
   * Metodo inicia as variaveis e carrega as informações do banco de dados
   *
   * @return void
   */
  private function init(): void
  {
    $this->setData('user', (new PedidoService)->user_logado());
    $this->setData('cardapios', (new CardapioPastelModel)->find()->fetch(true));
    $this->setData('bebidas', (new BebidaModel)->find()->fetch(true));
    $this->setData('localizacao', (new LocalizacaoModel)->find()->fetch(true));
    $this->setData('title', "Pastelaria - Pedido");
    $this->lojaService = new LojaService();
  }

  public function render(Request $request, Response $response, $args): Response
  {

    $this->init();

    $pageContent = $this->GetPage();

    $response->getBody()->write($pageContent);

    return $response;
  }

  /**
   * @param array[$data]
   * @return string
   */
  protected function GetPage(): string
  {
    $this->setData('title', $this->title);

    $this->setData('message', isset($data['message']) ? $data['message'] : '');

    return $this->template->render('pedido', $this->getData());
  }

  /**
   *  
   *
   * @param [array] $params
   * @return void
   */
  public function add_pastel(array $params): void
  {
    if (inFuncionamento()) {
      $message  = $this->lojaService->adicionar_items(
        (int) $params['idProduto'],
        [
          'produto' => 'pastel',
          'codigoItem' => 'idCardapioPastel',
          'attributeName' => 'saborDoPastel'
        ]
      );
    } else {
      $message = "Loja Fechada, Tente Mais tarde!";
    }

    // $this->getRouter()->redirect("pedido/{$message}");
  }

  /**
   * Undocumented function
   *
   * @param [type] $params
   * @return void
   */
  public function remove_pastel($params)
  {
    if (inFuncionamento()) {
      $message = $this->lojaService->remover_items(
        (int)$params['idProduto'],
        [
          'produto' => 'pastel',
          'codigoItem' => 'idCardapioPastel',
          'attributeName' => 'saborDoPastel'
        ]
      );
    } else {
      $message = "Loja Fechada, Tente Mais tarde!";
    }
    // $this->getRouter()->redirect("pedido/{$message}");
  }

  /**
   * @param [type] $params
   * @return void
   */
  public function add_bebida($params)
  {
    if (inFuncionamento()) {
      $message = $this->lojaService->adicionar_items(
        (int)$params['idProduto'],
        [
          'produto' => 'bebida',
          'codigoItem' => 'idBebida',
          'attributeName' => 'sabor'
        ]
      );
    } else {
      $message = "Loja Fechada, Tente Mais tarde!";
    }
    // $this->getRouter()->redirect("pedido/{$message}");
  }

  /**
   * @param array[$params]
   * @return void
   */
  public function remove_bebida(array $params)
  {
    if (inFuncionamento()) {
      $message = $this->lojaService->remover_items(
        (int)$params['idProduto'],
        [
          'produto' => 'bebida',
          'codigoItem' => 'idBebida',
          'attributeName' => 'sabor'
        ]
      );
    } else {
      $message = "Loja Fechada, Tente Mais tarde!";
    }
    // $this->getRouter()->redirect("pedido/{$message}");
  }

  /**
   * Metodo respnsavel por salvar e registrar as informações de um novo pedido
   * @return void
   */
  public function caixa(): void
  { // verifica de há um usuário logado e se tiver obtem seu id da tabela cliente
    if (inFuncionamento()) {
      $dataset = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

      $pedido = (new \Source\Models\site\PedidoModel())->createNew($dataset);

      if ($pedido->success) {
        $this->setData('message', "Pedido Solicitado com success");
      } else {
        $this->setData('message', 'Falha ao solicita um novo peiddo');
      }

      LojaService::limpar_carrinho();
    } else {
      $this->setData('message', "Loja Fechada, Tente Mais tarde!");
    }

    // $this->getRouter()->redirect("ver-pedido/{$this->getData()['message']}");
  }

  /**
   * @param array[$data]
   * @return void
   */
  public function error(array $data): void
  {
    $this->setData('title', SITE . " | Error");
    $this->setData('error', $data['errcode']);
    echo $this->getTemplate()->render('error', $this->getData());
  }
}
