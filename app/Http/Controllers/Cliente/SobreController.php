<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SobreController extends Controller
{
    //
    public function homeTemplate() {

        $template = view('cliente.sobre');

        return $template;
    }
}
