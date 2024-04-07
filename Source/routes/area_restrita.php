<?php


// namespace Source/App/Admin
$route->namespace("Source\Controller\Restrita");
/**
 * Rotas area-restrita
 * Ex: www.site.com/area-restrita
 */
$route->group('area-restrita');

// painel de acesso
$route->get("/", "AuthenticateAdmin:home");
$route->get("/{message}", "AuthenticateAdmin:home");
$route->get("/login-admin", "AuthenticateAdmin:login_admin");
$route->get("/login-admin/{message}", "AuthenticateAdmin:login_admin");
$route->post("/login-validate", "AuthenticateAdmin:login_validate");


if (isset($_SESSION['user_system'])) {
    // main
    $route->get("/dashboard", "areaRestritaController:home");
    $route->get("/dashboard/{message}", "areaRestritaController:home");

    // manipulando pedidos
    $route->get("/remove-pedido/{id_pedido}", "areaRestritaController:remove_pedido");
    $route->get("/detalhes-pedido/{id_pedido}", "areaRestritaController:buscarPedidoDetalhes");
    $route->post("/detalhes-pedido-store", "areaRestritaController:storePedidoDetalhes");

    // servicos
    $route->get("/pastel", "Products:pastel", "areaRestrita.pastel");
    $route->get("/pastel/{message}", "Products:pastel", "areaRestrita.pastel");

    // serviços do item Pastel/cardapio
    $route->get("/pastel-edit/{id_pastel}", "Products:edit_pastel");
    $route->post("/pastel-store", "Products:store_pastel");
    $route->get("/pastel-remove/{id_pastel}", "Products:remove_pastel");

    // serviços do item bebida
    $route->get("/bebida", "areaRestritaController:bebida", "areaRestrita.bebida");
    $route->get("/bebida/{message}", "areaRestritaController:bebida", "areaRestrita.bebida");
    $route->get("/bebida-edit/{id_bebida}", "areaRestritaController:edit_bebida", "areaRestrita.edit_bebida");
    $route->post("/bebida-store", "areaRestritaController:store_bebida", "areaRestrita.store_bebida");
    $route->get("/bebida-remove/{id_bebida}", "areaRestritaController:remove_bebida", "areaRestrita.remove_bebida");

    // serviço de pedidos
    $route->get("/pedido", "areaRestritaController:pedido", "areaRestritaController.pedido");
    $route->get("/pedido/{message}", "areaRestritaController:pedido", "areaRestritaController.pedido");

    // serviço de acesso a plataforma restrita
    $route->get("/seja-bem-vindo/{message}", "areaRestritaController:seja_bem_vindo", "areaRestrita.seja_bem_vindo");
    $route->get("/cadastro-store", "areaRestritaController:store", "areaRestrita.store");
    $route->get("/show-user-on", "areaRestritaController:showUserOn", "areaRestrita.showUserOn");

    // logout
    $route->get("/logout", "AuthenticateAdmin:logout");
}
