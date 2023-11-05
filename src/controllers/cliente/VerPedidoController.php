<?php


namespace Src\controllers\cliente;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use CoffeeCode\Router\Router;
use Source\Models\site\PedidoModel;

class VerPedidoController extends Controller
{
  private $filePathPage = 'clients/ver_pedido';
  protected $title = "Ver Pedido";

  public function __construct()
  {
    parent::__construct();

    $this->setData('registro_pedido', (new PedidoModel())->ver_pedido());
  }

  public function render(Request $request, Response $response, $args): Response
  {

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
    $this->setData('messagem_pedido_invalido', (isset($data['message']) && !empty($data['message'])) ? $data['message'] : '');

    $this->setData('title', $this->title);
    
    return $this->template->render($this->filePathPage, $this->getData());
  }
 
  /**
   * @param array[$data]
   * @return void
   */
  public function error(array $data): void
  {
    $this->data['title'] = SITE . " | Error";
    $this->data['error'] = $data['errcode'];
    echo $this->getTemplate()->render('erro', $this->data);
  }

  public function __desctruct()
  {
    if (isset($_SESSION['user_comun_id'])) {
      unset($_SESSION['user_comun_id']);
    }
  }
}
