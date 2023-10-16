<?php

namespace Source\Controller\Cliente;

use CoffeeCode\Router\Router;
use Source\Controller\Cliente\Service\ClienteService;
use Source\Models\site\User;


class ClienteController extends Controller {
  public $clienteService = null;
  
  /**
   * Contructor()
   * @return void
   */
  public function __construct(Router $router)
  {
    $this->setRouter($router);
    $this->clienteService = new ClienteService();
    parent::__construct();
  }
 
  /**
   * Método responsavel por validar o login do usuario
   * @param array[$data]
   * @return void
   */
  public function check_login(array $data): void
  {
    // array(
    //   ["user_login"]=> string(12) DATA
    //   ["user_senha"]=> string(6) DATA
    // )
   
    $instance=$this->clienteService->cliente_validate_login($_POST);
    
    $message = $this->clienteService->create_gestao_login($instance);

    $this->getRouter()->redirect("contato/{$message}");
  }

  /**
   * Metodo responsavel por apagar a sessão do user_cliente e superuser
   * @return void
   */
  public function logout(): void
  {
    $message = "não encontrado";

    $keyUser = '';

    if (isset($_SESSION['user_cliente'])) $keyUser = 'user_cliente';

    (new User)->ativarUser( (int) $_SESSION[$keyUser]['id'] , '0');

    switch ($keyUser) {
      case 'user_cliente':
        unset($_SESSION['user_cliente']); //'user_cliente'
        $message = "Conta Cliente Desconectada!";
        break;
    }

    $this->getRouter()->redirect("contato/{$message}");
  }

  /**
   * Método responsavel por renderizar a página de cadastro para o
   * usuario se cadastrar
   * @param array[$data]
   * @return void
   */
  public function create(array $data): void
  {

    $this->data['message'] = isset($data['message']) ? $data['message'] : '';

    $this->data['title'] = SITE . " | Cadastro";

    echo $this->getTemplate()->render('site/cadastro', $this->data);
  }

  /**
   * Criando um novo usuario na table users
   * @param array[$data]
   * @return void
   */
  public function store(array $data): void
  {
    // filtra as informação enviada via post
    $new_cliente = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    if (in_array('', $new_cliente)) {
      $message = "error";
    }

    $user_new = (new User)->create_user_cliente($new_cliente);

    // create_user_cliente
    if ($user_new->success) {
      $message = "success";
    } else {
      $message = "error";
    }

    $this->getRouter()->redirect("cliente/cadastro/{$message}");
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
}
