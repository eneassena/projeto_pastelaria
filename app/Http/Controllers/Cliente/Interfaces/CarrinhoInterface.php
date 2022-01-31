<?php


namespace App\Http\Controllers\Cliente\Interfaces;

/**
 *
 */
interface InterfaceCarrinho
{
    public function calculador_caixa():void;
    public function dadosCliente():void;
    public function insere_pastel(int $idpedido):void;
    public function limpar_carrinhos():void;
}
