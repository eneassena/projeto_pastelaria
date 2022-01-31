<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cliente\Interfaces\CardapioInterface;

class CardapioController extends Controller implements CardapioInterface
{
    //
    public function homeTemplate() {

        $template = view('cliente.cardapio');

        return $template;
    }

    public function adicionar_pasteis(int $id): void {
        //
    }
    public function remover_pasteis(int $id): void {
        //
    }
    public function adicionar_bebidas(int $id): void {
        //
    }
    public function remover_bebidas(int $id): void {
        //
    }
}
