<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    //
    public function homeTemplate() {

        $template = view('cliente.cardapio');

        return $template;
    }
}
