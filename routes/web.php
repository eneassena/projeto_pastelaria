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


use App\Http\Services\ProdutosService;

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

Route::get('produtos', function() {

    $cardapios = ProdutosService::cardapio();
    $bebidas = ProdutosService::bebida();
    $localizacao = ProdutosService::localizacao();

    echo "<h1>Cardápio</h1>";
    echo '<pre>';
    foreach($cardapios as $row => $value){
        if($row == 10) break;
        printf("<p>%d | %s</p>",  $row, $value->sabor);
    }
    echo "<h1>Bebidas</h1>";
    foreach($bebidas as $row => $value){
        if($row == 10) break;
        printf("<p>%d | %s | %s | %s</p>",  $row, $value->tipo_bebida, $value->sabor, $value->tamanho);
    }
    echo "<h1>Localizacao</h1>";
    foreach($localizacao as $row => $value){

        printf("<p>%d | %s</p>",  $row, $value->bairro);
    }


});


// rotas de authenticate e criação de usuarios
Route::get('/login', [AuthUserController::class, 'login']);
Route::post('/login/auth', [AuthUserController::class, "authenticate"]);
Route::get('/logout', [AuthUserController::class, "logout"]);
Route::get('/create', [AuthUserController::class, "create"]);
Route::post('/store', [AuthUserController::class, "store"]);


//
// Area Restrita
Route::get('/area-restrita', [AreaRestritaController::class, "homeTemplate"]);
