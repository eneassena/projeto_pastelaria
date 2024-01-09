<?php

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\Router\Router;

require __DIR__ . '/vendor/autoload.php';

use League\Plates\Engine;



$app = new Router("http://127.0.0.1:8000");





$app->group(null);
$app->get("/", function () {

    $template = new Engine(__DIR__ . "/views", 'php');
    $view = $template->render('index');
    echo $view;
});

$app->get("/about", function () {
    echo "about";
});


$app->dispatch();

if ($app->error()) {
    var_dump($app->error());
}
