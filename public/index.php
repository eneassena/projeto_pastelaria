<?php
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Src\controllers\cliente\HomeController;
use Src\controllers\cliente\AboutController;
use Src\controllers\cliente\VerPedidoController;
use Src\controllers\cliente\PedidoController;

$app = AppFactory::create();

$app->setBasePath('/projeto_pastelaria');

$app->get('/', [HomeController::class, 'render']);
$app->get('/sobre', [AboutController::class, 'render']);
$app->get('/ver-pedido', [VerPedidoController::class, 'render']);
$app->get('/pedido', [PedidoController::class, 'render']);



// Parse json, form data and xml
$app->addBodyParsingMiddleware();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

// http://127.0.0.1/users
// cors
$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '127.0.0.1:3000')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
 
$app->run();