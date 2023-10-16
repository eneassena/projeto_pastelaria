<?php


namespace Source\Controller\Cliente;

use CoffeeCode\Router\Router;
use Source\Models\site\PedidoModel;

class VerPedidoController extends Controller
{
  public function __construct(Router $router)
  {
   
    parent::__construct();
    $this->setRouter($router);
    $this->setData('registro_pedido', (new PedidoModel())->ver_pedido());
  }

  /**
   * @param array[$data]
   * @return void
   */
  public function home(array $data): void
  {
    $this->setData('messagem_pedido_invalido', (isset($data['message']) && !empty($data['message'])) ? $data['message'] : '');

    $this->setData('title', SITE . " | Ver Pedido");
     
    echo $this->getTemplate()->render("site/ver_pedido", $this->getData());
  }

  /**
	 * @param array[$data]
	 * @return void
	 */
	public function error(array $data): void
	{
		$this->data['title'] = SITE . " | Error";
		$this->data['error'] = $data['errcode'];
		echo $this->getTemplate()->render('site/erro', $this->data);
	}

  public function __desctruct() {
    if(isset($_SESSION['user_comun_id'])) {
      unset($_SESSION['user_comun_id']);
    }    
  }
}
