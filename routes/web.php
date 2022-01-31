<?php

use App\Http\Controllers\Restrita\AreaRestritaController;
use App\Http\Controllers\Cliente\CardapioController;
use App\Http\Controllers\Cliente\HomeController;
use App\Http\Controllers\Cliente\ListaDeEsperaController;
use App\Http\Controllers\Cliente\SobreController;
use App\Http\Controllers\AuthUserController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, "homeTemplate"]);
Route::get('/sobre', [SobreController::class, "homeTemplate"]);
Route::get('/lista-de-espera', [ListaDeEsperaController::class, "homeTemplate"]);
Route::get('/cardapio', [CardapioController::class, "homeTemplate"]);

Route::get('/login', function() {
    $template = view('cliente.forms.login_user');

    echo $template;

});
Route::post('/login/auth', [AuthUserController::class, "authenticate"]);
Route::get('/logout', [AuthUserController::class, "logout"]);
Route::get('/create', [AuthUserController::class, "create"]);
Route::post('/store', [AuthUserController::class, "store"]);


//
// Area Restrita
Route::get('/area-restrita', [AreaRestritaController::class, "homeTemplate"]);
