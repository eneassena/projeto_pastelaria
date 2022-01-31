<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function homeTemplate() {

        $template = view('cliente.home');

        return $template;
    }
}
