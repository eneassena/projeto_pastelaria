<?php

use App\Http\Controllers\AreaRestritaController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListaDeEsperaController;
use App\Http\Controllers\SobreController;
use Illuminate\Support\Facades\Route;



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

// 
// Area Restrita
Route::get('/area-restrita', [AreaRestritaController::class, "homeTemplate"]);