<?php

namespace App\Http\Controllers\Restrita;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaRestritaController extends Controller
{
    //
    public function homeTemplate(Request $request)
    {
        $template = view('restrita.dashboad');

        return $template;
    }
}
