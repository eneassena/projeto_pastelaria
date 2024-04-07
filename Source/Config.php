<?php

use CoffeeCode\DataLayer\Connect;
use Source\Service\PedidoService;

use Symfony\Component\Dotenv\Dotenv;



$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env.local');

// www.meusite.com.br
define("ROOT", "http://localhost/projeto_pastelaria");

/** config de templates Cliente */
define("PATH_TEMPLATE", dirname(__DIR__, 1) . '/theme');

/** config de template Admin */
define("PATH_ADMINLTE_IMAGE", "https://adminlte.io/themes/v3");

/** config arquivos statics */
define("PATH_STATIC", dirname(__DIR__, 1) . '/theme/assets');

/** separador de caminhos de pastel/arq */
define("DS", DIRECTORY_SEPARATOR);

/** @var SITE: nome do site */
define("SITE", "Pastelaria");

/** variavel com configuração de rélogio por estado do pais */
$timezones = array(
    'AC' => 'America/Rio_branco',   'AL' => 'America/Maceio',
    'AP' => 'America/Belem',        'AM' => 'America/Manaus',
    'BA' => 'America/Bahia',        'CE' => 'America/Fortaleza',
    'DF' => 'America/Sao_Paulo',    'ES' => 'America/Sao_Paulo',
    'GO' => 'America/Sao_Paulo',    'MA' => 'America/Fortaleza',
    'MT' => 'America/Cuiaba',       'MS' => 'America/Campo_Grande',
    'MG' => 'America/Sao_Paulo',    'PR' => 'America/Sao_Paulo',
    'PB' => 'America/Fortaleza',    'PA' => 'America/Belem',
    'PE' => 'America/Recife',       'PI' => 'America/Fortaleza',
    'RJ' => 'America/Sao_Paulo',    'RN' => 'America/Fortaleza',
    'RS' => 'America/Sao_Paulo',    'RO' => 'America/Porto_Velho',
    'RR' => 'America/Boa_Vista',    'SC' => 'America/Sao_Paulo',
    'SE' => 'America/Maceio',       'SP' => 'America/Sao_Paulo',
    'TO' => 'America/Araguaia',
);

/** config de rélogio */
define("TIMEZONE", date_default_timezone_set($timezones['BA']));


/** constante de conexão de banco de dados */
define("DATA_LAYER_CONFIG", [
    "driver"    => $_ENV['DB_DRIVER'],
    "host"      => $_ENV['DB_HOST'],
    "port"      => $_ENV['DB_PORT'],
    "dbname"    => $_ENV['DB_NAME'],
    "username"  => $_ENV['DB_USER'],
    "passwd"    => $_ENV['DB_PASSWD'],
    "options"   => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);


$c = Connect::getInstance();
$e = Connect::getError();
if ($e) {
    var_dump($e);
    die;
}
