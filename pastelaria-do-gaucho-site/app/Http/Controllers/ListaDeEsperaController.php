<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListaDeEsperaController extends Controller
{
    //
    public function homeTemplate() {

        $template = view('cliente.listadeespera');

        return $template;
    }
}
