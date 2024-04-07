<?php

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
