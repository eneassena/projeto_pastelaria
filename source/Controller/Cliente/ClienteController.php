<?php

namespace Source\Controller\Cliente;

use CoffeeCode\Router\Router;
use Source\Controller\Cliente\Service\ClienteService;
use Source\Models\site\User;


class ClienteController extends Controller
{

  /**
   * Contructor()
   * @return void
   */
  public function __construct(Router $router)
  {
    parent::__construct();
    $this->setRouter($router);
    $this->clienteService = new ClienteService();
  }

  /**
   * Método responsavel por Altera a senha do usuario
   * @return void
   */
  function update(): void {
    header('Content-Type: application/json');
    
    if(count($_POST) > 0 ){
      
      $data = filter_var_array($_POST, FILTER_SANITIZE_STRING);

      $json = [
        'data' => $data,
        'user' => null
      ];
      
      $user = (new User)->find("login= :log", "log=". $data['login'])->fetch();

      $json['user'] = $user->data();

      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

      $user->data()->senha = $data['password'];

      $json['update'] = $user->save();

      echo json_encode($json);

      http_response_code(200);
    } else {
      http_response_code(404);
    }
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
    $data = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $instance= (new User)->login($data);
    // $instance = $this->clienteService->cliente_validate_login($_POST);
    

    if (!$instance->success) {
      $message = "Crendenciais invalidas";
      $this->getRouter()->redirect("contato/{$message}");
    }
    if (strcmp($instance->user->tipoUsuario, 'cliente') == 0) {

      $_SESSION['user_' . $instance->user->tipoUsuario] = [
        'id' => $instance->user->idUser,
        'tipoUser' => $instance->user->tipoUsuario
      ];
 
      (new User)->ativarUser((int) $instance->user->idUser, '1');

      $message = "Usuário {$instance->user->login}, logado com sucesso!";
      $this->getRouter()->redirect("contato/{$message}");
    }
    $message = "Usuario Invalido!!!";
    echo $this->getRouter()->redirect("contato/{$message}");
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
    $new_cliente = filter_var_array($_POST, FILTER_SANITIZE_STRING);

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
