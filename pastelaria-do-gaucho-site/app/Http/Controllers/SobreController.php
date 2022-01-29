<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreController extends Controller
{
    //
    public function homeTemplate() {

        $template = view('cliente.sobre');

        return $template;
    }
}
