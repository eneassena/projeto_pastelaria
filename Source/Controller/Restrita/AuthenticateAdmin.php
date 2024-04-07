<?php


namespace Source\Controller\Restrita;

use CoffeeCode\Router\Router;
use Source\Models\site\User;
use stdClass;

class AuthenticateAdmin extends Controller
{
    protected $messages = [
        "Usuário Desconectado com sucesso!",    // [0]
        "Usuário Conectado com sucesso!",       // [1]
        "Credenciais invalidas!",               // [1]
    ];


    /**
     * @param Router[$router]
     * @return void
     */
    public function __construct(Router $router)
    {
        parent::__construct();
        $this->router = $router;
    }

    /* 
     * Esa action tenta renderizar a 
     * página principal quando não há sessão para admins
     */
    public function home(): void
    {
        if (!isset($_SESSION['user_system'])) {
            $this->router->redirect("/area-restrita/login-admin");
        }
        $this->router->redirect("/area-restrita/dashboard");
    }

    public function login_admin(array $args): void
    {
        if (isset($args['message']) && !empty($args['message'])) {
            $this->data['message'] = $this->messages[(int)$args['message']];
        }

        $this->data['title'] = SITE . " - Painel Admin";
        echo $this->views->render("admin/login_admin", $this->data);
    }

    /**
     * validate users admins
     * @param array[$args]
     * @return void
     */
    public function login_validate(array $args = []): void
    {
        $data = array();
        if (!in_array('', $_POST)) {
            $data['user_senha'] = htmlspecialchars($_POST['user_senha']);
            $data['user_login'] = htmlspecialchars($_POST['user_login']);
            $admin = (new User())->loginAdmin($data);

            if ($admin->success) {
                $admin->userBeOnline((int) $admin->user->idUser, '1');

                $_SESSION['user_system'] = [
                    'id' => $admin->user->idUser,
                    'type_user' => $admin->user->tipoUsuario,
                    'active' => ($admin->user->ativo == '1') ? true : false
                ];
                unset($admin);
                $this->router->redirect(
                    "/area-restrita/seja-bem-vindo/1"
                );
            } else {
                $this->router->redirect("area-restrita/login-admin/2");
            }
        } else {
            $this->router->redirect("/area-restrita/login-admin/2");
        }
    }

    /**
     * Metodo realiza logout
     * @return void
     */
    public function logout(): void
    {
        if (isset($_SESSION['user_system'])) {
            (new User)->userBeOnline((int) $_SESSION['user_system']['id'], '0');

            unset($_SESSION['user_system']);

            $this->router->redirect("/area-restrita/login-admin/0");
        }
    }

    /**
     * Metodo obtem o usuario que esta logado
     * @return stdClass|nul
     * 
     */
    public static function showUserOn(): stdClass|null
    {
        $idSuperUser = isset($_SESSION['user_system']) ? $_SESSION['user_system']['id'] : null;

        return !is_null($idSuperUser) ? (new User)->findById(intval($idSuperUser))->data() : null;
    }
}
