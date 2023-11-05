<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;
use CoffeeCode\DataLayer\Connect;


session_start();
// session_start();
//var_dump(session_regenerate_id());
//var_dump($_SESSION);
 
$route = new Router(ROOT);
 
$c = Connect::getInstance();
$e = Connect::getError();
if( $e){
    var_dump($e);
    die;
}


/**
 * APP
 */
$route->namespace("Source\Controller\Cliente");



/**
 * web
 * Ex: www.site.com
 */
$route->group(null);
$route->get("/", "HomeController:home", "name.home");
$route->get("/contato/{message}", "HomeController:home", "name.home");



/**
 * ERROR
 * Ex: www.site.com/ops/args
 */
$route->group("ops");
$route->get("/{errcode}", "HomeController:error");


/**
 * Sobre
 * Ex: www.site.com/sobre
 */
$route->group('sobre');
$route->get('/', "SobreController:home", "name.sobre");



/**
 * verPerdido
 * Ex: www.site.com/ver-pedido
 */
$route->group('ver-pedido');
$route->get('/', "VerPedidoController:home", "name.ver-pedido");
$route->get('/{message}', "VerPedidoController:home", "name.ver-pedido");
// $route->get('/show-pedidos', "VerPedidoController:show_all_pedidos", "name.show.pedido");


/**
 * Pedido
 * Ex: www.site.com/pedido
 */
$route->group('pedido');
$route->get("/", "PedidoController:home", "name.pedido");
$route->get("/{message}", "PedidoController:home");

$route->get("/pastels", "PedidoController:pastels", "pedido.pastels");
$route->get("/add-pastel/{idProduto}", "PedidoController:add_pastel", "pedido.add_pastel");
$route->get("/remove-pastel/{idProduto}", "PedidoController:remove_pastel", "pedido.remove_pastel");


$route->get("/add-bebida/{idProduto}", "PedidoController:add_bebida", "pedido.add_bebida");
$route->get("/remove-bebida/{idProduto}", "PedidoController:remove_bebida", "pedido.remove_bebida");
$route->post("/caixa", "PedidoController:caixa", "pedido.caixa");



/**
 * Cliente
 * Rotas de realização de login e logout
 *
 */
$route->group('cliente');
$route->post("/check-login", "ClienteController:check_login");
$route->get("/cadastro", "ClienteController:create", "name.create");
$route->post("/update", "ClienteController:update", "name.update");
$route->get("/cadastro/{message}", "ClienteController:create", "name.create");
$route->get("/logout", "ClienteController:logout", "name.logout");
$route->post("/cadastro/store", "ClienteController:store", "name.store");
// if (isset($_SESSION['person_comun']['on'])) {}


// namespace Source/App/Admin
$route->namespace("Source\Controller\Restrita");
/**
 * Rotas area-restrita
 * Ex: www.site.com/area-restrita
 */
$route->group('area-restrita');

// painel de acesso
$route->get("/", "areaRestritaController:home", "area_restrita.home");
$route->get("/{message}", "areaRestritaController:home", "area_restrita.home");
$route->get("/login-admin", "areaRestritaController:login_admin", "area_restrita.login_admin");
$route->get("/login-admin/{message}", "areaRestritaController:login_admin", "area_restrita.login_admin");
$route->post("/login-validate", "areaRestritaController:login_validate", "area_restrita.login_validate");


if(isset($_SESSION['user_superuser'])){
    // main
    $route->get("/", "areaRestritaController:home", "areaRestrita.home");
    $route->get("/{message}", "areaRestritaController:home", "areaRestrita.home");

    // manipulando pedidos
    $route->get("/remove-pedido/{id_pedido}", "areaRestritaController:remove_pedido");
    $route->get("/detalhes-pedido/{id_pedido}", "areaRestritaController:buscarPedidoDetalhes");
    $route->post("/detalhes-pedido-store", "areaRestritaController:storePedidoDetalhes");

    // servicos
    $route->get("/pastel", "areaRestritaController:pastel", "areaRestrita.pastel");
    $route->get("/pastel/{message}", "areaRestritaController:pastel", "areaRestrita.pastel");

    // serviços do item Pastel/cardapio
    $route->get("/pastel-edit/{id_pastel}", "areaRestritaController:edit_pastel", "areaRestrita.edit_pastel");
    $route->post("/pastel-store", "areaRestritaController:store_pastel");
    $route->get("/pastel-remove/{id_pastel}", "areaRestritaController:remove_pastel");

    // serviços do item bebida
    $route->get("/bebida", "areaRestritaController:bebida", "areaRestrita.bebida");
    $route->get("/bebida/{message}", "areaRestritaController:bebida", "areaRestrita.bebida");
    $route->get("/bebida-edit/{id_bebida}", "areaRestritaController:edit_bebida", "areaRestrita.edit_bebida");
    $route->post("/bebida-store", "areaRestritaController:store_bebida", "areaRestrita.store_bebida");
    $route->get("/bebida-remove/{id_bebida}", "areaRestritaController:remove_bebida", "areaRestrita.remove_bebida");

    // chat
    $route->get("/chat", "ChatContactController:chat", "name.chat");
    $route->post("/chat", "ChatContactController:store", "name.store");


    // serviço de pedidos
    $route->get("/pedido", "areaRestritaController:pedido", "areaRestritaController.pedido");
    $route->get("/pedido/{message}", "areaRestritaController:pedido", "areaRestritaController.pedido");

    // serviço de acesso a plataforma restrita
     $route->get("/seja-bem-vindo/{message}", "areaRestritaController:seja_bem_vindo", "areaRestrita.seja_bem_vindo");
    $route->get("/cadastro-store", "areaRestritaController:store", "areaRestrita.store");
    $route->get("/show-user-on", "areaRestritaController:showUserOn", "areaRestrita.showUserOn");



    // logout
    $route->get("/logout", "areaRestritaController:logout", "auth.logout");
}

/**
 * PROCESS
 */
$route->dispatch();


// captura errors
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}
