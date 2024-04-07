<?php


namespace Source\Controller\Restrita;

use CoffeeCode\Router\Router;
use Source\Models\site\BebidaModel;
use Source\Models\site\CardapioPastelModel;
use Source\Service\LojaService;
use Source\Service\RestritaService;

class Products extends Controller
{
    protected $data;
    protected $list_products;
    private const TYPE_USER_SESSION = "user_system";
    protected $lojaService;
    protected $restritaService;
    protected $user;


    public function __construct(Router $router)
    {
        parent::__construct();
        $this->list_products = array();
        $this->data = [];
        $this->restritaService = new RestritaService();
        $this->lojaService = new LojaService();
        $this->data['cardapio'] = (new CardapioPastelModel())->find()->fetch(true);
        $this->data['bebida'] = (new BebidaModel())->find()->fetch(true);
        $this->router = $router;

        $this->user = AuthenticateAdmin::showUserOn();
    }

    /**
     * listagem dos pasteis
     * @param array[$data]
     * @return void
     */
    public function pastel(array $data): void
    {
        if (isset($data['message'])) $this->data['message'] = $data['message'];

        $this->data['pastels'] = (new CardapioPastelModel)->find()->fetch(true);

        if (isset($_SESSION[Products::TYPE_USER_SESSION])) {
            $this->data['user'] = AuthenticateAdmin::showUserOn();
        }
        $this->data['title'] = SITE . " - Area Restrita";
        echo $this->views->render("admin/pastel", $this->data);
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

        echo $this->views->render('admin/forms/editar_pastel', [
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
        $this->router->redirect("area-restrita/pastel/");
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

        if (isset($_SESSION[Products::TYPE_USER_SESSION])) {
            $this->data['user'] = AuthenticateAdmin::showUserOn();
        }

        $this->data['title'] = SITE . " - Area Restrita";

        echo $this->views->render("admin/bebida", $this->data);
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
                echo $this->views->render('admin/forms/editar_bebida', [
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
}
