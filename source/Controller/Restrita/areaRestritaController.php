<?php

namespace Source\Controller\Restrita;


use Source\Models\site\BebidaModel;
use Source\Models\site\CardapioPastelModel;
use Source\Models\site\PedidoModel;
use Source\Models\site\User;
use Source\Service\LojaService;
use Source\Service\RestritaService;
use CoffeeCode\Router\Router;
use stdClass;
 
class areaRestritaController extends Controller
{
  /** @var User|null[$user] */
  public $user = null;

  public function __construct(Router $router)
  {
    parent::__construct();
    $this->data['cardapio'] = (new CardapioPastelModel())->find()->fetch(true);
    $this->data['bebida'] = (new BebidaModel())->find()->fetch(true);
    $this->data['pedidos'] = (new PedidoModel)->ver_pedido();
    $this->restritaService = new RestritaService();
    $this->lojaService = new LojaService;
    $this->router = $router;

    $this->user = $this->showUserOn();
    $this->data['user'] = $this->user ? $this->user : null;
  }
 
  /**
   * Metodo reflete atualização de produtos
   * @param string $name
   * @return bool
   */
  public function updateSessionPastel(string $name = 'pastel'): bool
  {
    $pasteis = (new CardapioPastelModel())->find()->fetch(true);
    foreach ($pasteis as $pasteltb) {
      foreach ($_SESSION['cart'][$name] as $pastelS) {
        if ((int)$pasteltb->data()->idCardapioPastel == (int)$pastelS['item']->idCardapioPastel) {
          $pastelS['item']->valorUnitario = $pasteltb->data()->valorUnitario;
          return true;
        }
      }
    }
    return false;
  }

  /**
   * Método exibe a pagina principal da área restrita
   * @param array $data
   * @return void
   */
  public function home(array $data)
  {
    $page = null;

    $this->data['classNavigate'] = 'active';

    $this->data['title'] = SITE . " - Area Restrita";

    if (isset($data['message']))
      $this->data['message'] = $data['message'];

    if (!isset($_SESSION['user_superuser'])) {
      $page = "admin/login_admin";
      $this->router->redirect('area-restrita/login-admin');
    } else {
      $page = "admin/dashboad";
      $this->showUserOn();
    }
    echo $this->templates->render($page, $this->data);
  }

  /**
   * @param array[$data]
   * @return void
   */
  public function pedido(array $data): void
  {
    if (isset($data['message']) && !empty($data['message'])) {
      $this->data['message'] = $data['message'];
    }
    $this->showUserOn();
    $this->data['title'] = SITE . " | Pedido";

    echo $this->templates->render("admin/pedido", $this->data);
  }

  /**
   * Metodo responsavel por remover um pedido
   * @param array[$data]
   * @return void
   * */
  public function remove_pedido(array $data): void
  {
    $idPedido = (int) $data['id_pedido'];
    if ($idPedido) {
      $pedido = (new PedidoModel)->findById($idPedido);
      $pedido->destroy();
      $message = "Pedido foi removido";
    }
    $this->router->redirect("area-restrita/$message");
  }

  /**
   * Buscar todos informações do pedido especifico pelo seu codigo id
   * @param array[$data]
   * @return void
   * */
  public function buscarPedidoDetalhes(array $data): void
  {
    if ($data['id_pedido']) {
      $idPedido = (int) $data['id_pedido'];

      $pedido = (new PedidoModel)
        ->find("idPedido=:cod_pedido", "cod_pedido={$idPedido}")
        ->fetch();

      $pedido->buscarPedidoDetalhado();

      if ($pedido) {
        $this->data['detalhesPedido'] = $pedido->detalhes;

        $this->data['title'] = SITE . "Edição Pedido";

        echo $this->templates->render('admin/edicaoPedido/edit_pedido', $this->data);
      }
    }
  }

  /**
   * @return void
   */
  public function storePedidoDetalhes(): void
  {
    $message = "pedido não foi encontrado";
    $dataFormPedidoDetalhe = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $pedido = (new PedidoModel)->findById((int) $dataFormPedidoDetalhe['id_pedido']);

    if ($pedido->data()) {
      if(!is_null($dataFormPedidoDetalhe['taxa_entrega'])) {
        $pedido->taxaDeEntrega = str_replace(",", ".", $dataFormPedidoDetalhe['taxa_entrega']);
      }

      $pedido->situacao = $dataFormPedidoDetalhe['situacao'];
      $pedido->updated_at = date('Y-m-d H:m:s');
      $this->success= $pedido->save();
      
      $message = "pedido foi atualizado";
    } else {
      $this->success = false;
    }
    $this->router->redirect("area-restrita/pedido/$message");
  } // end storePedidoDetalhes()
  
   
  /**
   * listagem dos pasteis
   * @param array[$data]
   * @return void
   */
  public function pastel(array $data): void
  {
    if (isset($data['message'])) $this->data['message'] = $data['message'];

    $this->data['pastels'] = (new CardapioPastelModel)->find()->fetch(true);

    if (isset($_SESSION['user_superuser']['on'])) {
      $this->data['user'] = $this->showUserOn();
    }
    $this->data['title'] = SITE . " - Area Restrita";

    echo $this->templates->render("admin/pastel", $this->data);
  }

  /**
   * Metodo responsavel por rendereizar pagina com o pedido escolhido
   * pelo cliente
   * @param array[$data]
   * @return void
   * */
  public function edit_pastel(array $data = []): void
  {
    // buscar na tabela o cardapio clicado pelo usuario
    $idPastel = (int) $data['id_pastel'];

    $pastel = (new CardapioPastelModel)->findById($idPastel);

    echo $this->templates->render('admin/forms/editar_pastel', [
      "pastel" => $pastel->data()
    ]);
  }


  /**
   * Metodo responsavel atualizar os cardapio dos pasteis
   * Method Request: POST
   * @return void
   */
  public function store_pastel(): void
  {
    $datasetPastel = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $message = "Produto não foi encontrado!";
    $idPastel = isset($datasetPastel['idCardapioPastel']) ? (int)$datasetPastel['idCardapioPastel'] : 0;
    $pastel = (new CardapioPastelModel)->findById($idPastel);

    if ($pastel) {
      $pastel->data()->saborDoPastel = $datasetPastel['saborDoPastel'];
      $pastel->data()->ingrediente = !empty($datasetPastel['ingrediente']) ? $datasetPastel['ingrediente'] : null;
      $pastel->data()->valorUnitario = $datasetPastel['valorUnitario'];
      $pastel->data()->updated_at = date('Y-m-d H:m:s');
      $pastel->save();

      if (isset($_SESSION['cart'])) {
        $this->updateSessionPastel();
      }
      $message = "Produto alterado com êxito!";
    } else {
      $pastel = (new CardapioPastelModel())->new_cardapio([
        'saborDoPastel' => $datasetPastel['saborDoPastel'],
        'ingrediente' => $datasetPastel['ingrediente'],
        'valorUnitario' => $datasetPastel['valorUnitario']
      ]);
      if ($pastel->success) {
        $message = "Produto criado com êxito!";
      } else {
        $message = "Falha ao criar produto";
      }
    }
    $this->router->redirect("area-restrita/pastel/$message");
  }

  /**
   * Metodo faz a remoção de pasteis
   * @param int $id_pastel
   * Method Request: GET
   * @return void
   */
  public function remove_pastel(array $data): void
  {
    $idPastel = (int)$data['id_pastel'];

    if ($idPastel) {
      $pastel = (new CardapioPastelModel)->findById($idPastel);
      $pastel->destroy();
      $message = "Produto foi removido com êxito";
      $this->router->redirect("area-restrita/pastel/$message");
    }
    $message = "Produto não foi encontrado";
    $this->router->redirect("area-restrita/pastel/$message");
  }

  

  /**
   * listagem das bebidas
   * @param array[$data]
   * @return void
   */
  public function  bebida(array $data): void
  {

    if (isset($data['message'])) $this->data['message'] = $data['message'];

    $bebidas = (new BebidaModel())->find()->order('fruto ASC')->fetch(true);

    $this->data['bebidas'] = $bebidas;

    if (isset($_SESSION['user_superuser']['on'])) {
      $this->data['user'] = $this->showUserOn();
    }

    $this->data['title'] = SITE . " - Area Restrita";

    echo $this->templates->render("admin/bebida", $this->data);
  }

  /**
   * Metodo responsavel por renderizar a tela de edição de bebida
   * @param array[$data]
   * @return void
   * */
  public function edit_bebida(array $data = []): void
  {

    $idBebida = (int) $data['id_bebida'];

    if ($idBebida) {

      $bebida = (new BebidaModel)->findById($idBebida);

      if ($bebida) {
        echo $this->templates->render('admin/forms/editar_bebida', [
          'bebida' => $bebida->data()
        ]);
      }
    } else {
      $message = 'Bebida nao foi encontrada';
      $this->router->redirect("area-restrita/bebida/$message");
    }

  }
 

  /**
   * salvar alteração do produto bebida
   * @return void
   * */
  public function store_bebida(): void
  {

    $dataFormPost = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $this->restritaService->editar_bebida($dataFormPost);

    $message = "Produto bebida foi alterado com sucesso!";

    $this->router->redirect("area-restrita/bebida/$message");
  }

  /**
   * remove produto bebida
   * @param array[$data]
   * @return void
   * */
  public function remove_bebida(array $data): void
  {

    $idBebida = (int) $data['id_bebida'];

    if ($idBebida) {

      $bebida = (new BebidaModel)->findById($idBebida);

      $bebida->destroy();

      $message = "Produto bebida foi removido com sucesso!";
    }


    $this->router->redirect("area-restrita/bebida/$message");
  }

  /**
   * login_admin
   * @param array[$data] = []
   * @return void
   */
  public function login_admin(array $data = []): void
  {
    if (isset($data['message'])) {
      $this->data['message'] = $data['message'];
    } 
    
    $this->data['title'] = SITE . " - Painel Admin";
    echo $this->templates->render("admin/login_admin", $this->data);
  }


  /**
   * @param array[$data] = []
   * @return void
   */
  public function login_validate(array $value = []): void
  {
    if (in_array("", $_POST)) {
      $message = "Preencha os campos corretamente para proseguir.";
      $this->router->redirect("area-restrita/login-admin/$message");
    }

    $data = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $admin = (new User())->loginAdmin($data);

    if ( $admin->success ) {

      (new User)->ativarUser((int) $admin->user->idUser, '1');

      $_SESSION['user_' . $admin->user->tipoUsuario]['on'] = [
        'id' => $admin->user->idUser,
        'tipoUser' => $admin->user->tipoUsuario,
        'ativo' => $admin->user->ativo
      ];
      unset($admin);
      $this->router->redirect(
        "area-restrita/seja-bem-vindo/Login Realizado com sucesso!"
      );
    } else {
      $this->router->redirect(
        "area-restrita/login-admin/Informe suas credenciais de acesso corretamente!"
      );
    }
  }

  /**
   * @param array[$data]
   * @return void
   */
  public function seja_bem_vindo(array $data): void
  {
    if (isset($_SESSION['user_superuser']['on'])) {
      $this->data['user'] = $this->showUserOn();
    }

    $this->data['title'] = "Pastelaria - Area Restrita";
    $this->data['message'] = isset($data['message']) ? $data['message'] : '...';
    echo $this->templates->render("admin/dashboad", $this->data);
  }

  /**
   * Metodo realiza logout
   * @return void
   */
  public function logout(): void
  {
    if (isset($_SESSION['user_superuser']['on'])) {
      (new User)->ativarUser((int) $_SESSION['user_superuser']['on']['id'], '0');

      unset($_SESSION['user_superuser']['on']);

      $this->router->redirect('area-restrita/login-admin/desconectado com sucesso!');
    }
  }

  /**
   * Metodo obtem o usuario que esta logado
   * @return stdClass|nul
   * 
   */
  public function showUserOn(): stdClass|null
  {
    $idSuperUser = isset($_SESSION['user_superuser']['on']) ? $_SESSION['user_superuser']['on']['id'] : null;

    return $idSuperUser ? (new User)->findById((int) $idSuperUser)->data() : null;
  }
}
