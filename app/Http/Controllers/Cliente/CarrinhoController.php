<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Cliente\Interface\InterfaceCarrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller implements InterfaceCarrinho
{

    public function index()
    {

    }
    public function error()
    {

    }

    public function calculador_caixa():void {
        //
    }
    public function dadosCliente():void {
        //
    }
    public function insere_pastel(int $idpedido):void {
        //
    }
    public function limpar_carrinhos():void {
        //
    }
}
