<?php

namespace Source\Service;

use Source\Models\site\BebidaModel;
use Source\Models\site\CardapioPastelModel;

class LojaService
{
    private $data = [];

    public function __construct()
    {
        $this->init();
    }

    protected function init()
    {
        $this->data['pastels'] = (new CardapioPastelModel)->find()->fetch(true);
        $this->data['bebidas'] = (new BebidaModel)->find()->fetch(true);
        $this->data['recursos'] = [
            'cart'
        ];
        $this->criar_carrinho();
    }

    /**
     * método responsável por reotrna o array de carrinho da variavel
     * global $_SESSION
     */
    public static function show_carrinho(string $name_carrinho)
    {
        return $_SESSION['cart'][$name_carrinho];
    }

    /**
     * Método responsável por verificar se um carrinho já existe
     * na session e se nao houver cria um novo
     * @param string $name_carrinho
     */
    public function criar_carrinho()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [
                'pastel' => [],
                'bebida' => []
            ];
        }
    }

    /**
     * @param string[$nameProduct]
     * @param int[$idProduto]
     * @return mixed
     */
    private static function factoryProduct(string $nameProduct, int $idProduto)
    {
        $data = [
            'pastel' => (new CardapioPastelModel)->findById($idProduto),
            'bebida' => (new BebidaModel)->findById($idProduto)
        ];
        return $data[$nameProduct];
    }


    /**
     * Método responsável por adicionar items em um carrinho já existente
     * @param int[$idProduto]
     * @param array[$cart]
     * @return string
     */
    public function adicionar_items(int $idProduto, array $cart): string
    {// produto|  codigoItem
        $this->criar_carrinho();

        $this->data['message'] = 'Produto não foi encontrado';

        $produto = self::factoryProduct($cart['produto'], $idProduto);

        if($produto){
            $carrinho = $_SESSION['cart'][$cart['produto']];
            $this->data['hasProduto'] = false;

            if(count($carrinho) != 0)
            {
                foreach ($carrinho as $row => $value)
                {
                    if($carrinho[$row]['item']->{$cart['codigoItem']} == $produto->{$cart['codigoItem']} )
                    {
                        $this->data['hasProduto'] = true;

                        if($carrinho[$row]["qtd"] <= 5 ) {
                            $carrinho[$row]["qtd"]++;
                            $this->data['message'] = "O produto, {$value['item']->{$cart['attributeName']}} teve + 1 unidade adicionado";
                        } else {
                            $this->data['message'] = "oooppss limite maximo para esse produto pois já ultrapassa 5 unidade";
                        }
                        $_SESSION['cart'][$cart['produto']] = $carrinho;
                        break;
                    }
                }
            }

            if(!$this->data['hasProduto'])
            {
                array_push($carrinho, [
                    "item" => $produto->data(), "qtd" => 1
                ]);
                $_SESSION["cart"][$cart["produto"]] = $carrinho;

                $this->data["message"] = "O produto {$produto->data()->{$cart['attributeName']}} foi adicionado";
            }
        }
        return $this->data["message"];
    }

    /**
     * Método responsável por remover item de um carrinho já existente
     * @param int[$idProduto]
     * @param array[$cart]
     * @return string
     */
    public function remover_items(int $idProduto, array $cart): string
    { // produto| codigoItem

        // produto não foi encontrado/ falha ao remover o produto
        $this->data['message'] = 'produto não foi encontrado';

        $cartProduto = $_SESSION['cart'][$cart['produto']];

        if(is_array($cartProduto) && count($cartProduto) != 0){
            foreach($cartProduto as $row => $value) {
                if((int)$cartProduto[$row]['item']->{$cart['codigoItem']} == $idProduto) {
                    if((int)$cartProduto[$row]['qtd'] > 1) {
                        // produto teve 1 unidade removida
                        $this->data['message'] = "O produto {$value['item']->{$cart['attributeName']}} teve 1 unidade removida";
                        $cartProduto[$row]['qtd'] --;
                    } else {
                        // produto foi removido
                        $this->data['message'] = "O produto, {$value['item']->{$cart['attributeName']}} foi removido";
                        unset($cartProduto[$row]);
                    }
                    $_SESSION['cart'][$cart['produto']] = $cartProduto;
                    break;
                } else { $this->data['message'] = 'falha ao remover o produto'; }
            }
        }

        return $this->data['message'];
    }

    /**
     * Método responsável por limpar todo items do carrinho passado pelo param
     * apos calcular_valor_total do produto
     * @param string[$name_carrinho]
     * @return void
     */
    public static function limpar_carrinho(string $name_carrinho = 'cart'): void
    {
        if (isset($_SESSION[$name_carrinho]))
            unset($_SESSION[$name_carrinho]);
    }

    /**
     * Método responsável por calcular_valor_total dos carrinho e retorna o valor
     * calculado
     * @param string[$name_carrinho]
     * @param array[$cart]
     * @return int|float
     */
    public function calcular_valor_total(
        string $name_carrinho = 'pastel',
        array $cart=['attributeName'=> 'valorUnitario']
    ): int|float
    {
        if (!isset($_SESSION['cart'][$name_carrinho])) {
            return 0;
        }

        $total = 0;
        foreach ($_SESSION['cart'][$name_carrinho] as $row => $value)
            $total += (int)$value['qtd'] * (float)$value['item']->{$cart['attributeName']};

        return $total;

    }

    /**
     * @return float
     */
    public static function calc_total(): float
    {
        $saldo = 0;

        foreach ($_SESSION['cart']['pastel'] as $value)
            $saldo += (int)$value['qtd'] * (float)$value['item']->{'valorUnitario'};

        foreach ($_SESSION['cart']['bebida'] as $value)
            $saldo += (int)$value['qtd'] * (float)$value['item']->{'valorUnidade'};

        return $saldo;
    }
}
