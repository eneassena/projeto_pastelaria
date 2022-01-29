<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaRestritaController extends Controller
{
    //
    public function homeTemplate()
    {
        $template = view('restrita.dashboad');

        return $template;
    }
}
