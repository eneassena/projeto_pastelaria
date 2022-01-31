<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListaDeEsperaController extends Controller
{
    //
    public function homeTemplate() {

        $template = view('cliente.listadeespera');

        return $template;
    }
}
