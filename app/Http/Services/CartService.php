<?php

namespace App\Http\Services;

use App\Http\Service\Interfaces\InterfaceCart;

/**
 *
 */
class CartService implements InterfaceCart
{
    public static function calc_total(): float {
        //
    }
    public static function show_carrinho(string $name_carrinho): void {
        //
    }
    private static function factoryProduct(string $nameProduct, int $idProduto):void {
        //
    }
    public static function limpar_carrinho(string $name_carrinho = 'cart'): void {
        //
    }

    protected function init(): void {
        //
    }
    public function criar_carrinho(): void {
        //
    }
    public function calcular_valor_total(): void {
        //
    }

    public function remover_items(int $idProduto, array $cart): string {

        switch ($cart) {
            case 'pastel':
                break;
            case 'bebida':
                break;
            default:
                break;
        }
    }
    public function adicionar_items(int $idProduto, array $cart): string {
        //
    }
}
