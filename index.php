<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

// var_dump(password_hash('admin123', PASSWORD_DEFAULT));
session_start();
session_regenerate_id(true);

$route = new Router(ROOT);


/**
 * Routes cliente.php
 */
require __DIR__ . '/Source/routes/cliente.php';

/**
 * Routes area_restrita.php
 */
require __DIR__ . '/Source/routes/area_restrita.php';

$route->group("error");
$route->get("/{errcode}", "HomeController:error");
/**
 * PROCESS
 */
$route->dispatch();


// captura errors
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}
