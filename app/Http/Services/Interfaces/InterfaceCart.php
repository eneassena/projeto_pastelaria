<?php

namespace App\Http\Service\Interfaces;


interface InterfaceCart {

    public static function calc_total(): float;
    public static function show_carrinho(string $name_carrinho);
    private static function factoryProduct(string $nameProduct, int $idProduto): void;
    public static function limpar_carrinho(string $name_carrinho = 'cart'): void;

    protected function init(): void;
    public function criar_carrinho(): void;
    public function calcular_valor_total():void;

    public function remover_items(int $idProduto, array $cart): string;
    public function adicionar_items(int $idProduto, array $cart): string;
}
