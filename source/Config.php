<?php

use Source\Service\ConfigService;
use Source\Service\PedidoService;

// www.meusite.com.br
define("ROOT", "http://localhost/projeto_pastelaria");

/** config de templates Cliente */
define("PATH_TEMPLATE", dirname(__DIR__, 1).'/theme');
/** config de template Admin */
define("PATH_ADMINLTE_IMAGE", "https://adminlte.io/themes/v3");
/** config arquivos statics */
define("PATH_STATIC", dirname(__DIR__, 1).'/theme/assets');
/** separador de caminhos de pastel/arq */
define("DS", DIRECTORY_SEPARATOR);
/** @var SITE: nome do site */
define("SITE", "Pastelaria");


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
    "driver"    => "mysql",
    "host"      => "localhost",
    "port"      => 3306,
    "dbname"    => "pastelaria_gaucho",
    "username"  => "devsoftware391",
    "passwd"    => "softdev",
    "options"   => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);



/**
 * @param string|null $uri
 * @return string
 */
function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }
    return ROOT;
}
/**
 * @param string|null $uri
 * @return string
 */
function assets(string $uri = null): string
{
    $path_public = ROOT . "/theme";

    if ($uri) {
        return $path_public . "/{$uri}";
    }

    return $path_public;
}

/**
 * @param float[$valor]
 * @param float[$quantidade]
 * @return float
 */
 function calcular_total_item(float $valor, float $quantidade) {
    $total = $valor * $quantidade;

    $total = formata_precos($total);

    return $total;
 }

/**
 * Formata um valor float e retorna no formado para exibição em tela
 *
 * @param float $preco
 * @return float
 */
function formata_precos($preco=''): string
{
    return number_format((float)$preco, 2, ',', '.');
}

function valida_exibicao(array $data): bool
{
    return isset($data) && count($data) > 0;
}
 
/**
 * @param string[$recurso] = ''
 */
function valida_pastels(string $recurso='')
{
    $return = false;

    if(!inFuncionamento()) return false;

    if (isset($_SESSION['cart'][$recurso]))
    {
        $total = 0;
        foreach ($_SESSION['cart'][$recurso] as $id_item => $value)
        {
            $total += $value['qtd'];
        }
        $return = ($total >= 3) ? true : false;
    }
    return $return;
}

/**
 * Helper buscar o codigo do usuario logado
 *
 */
function user_load() {
    return (new PedidoService)->user_logado();
}

 

/**
 * @param array[$info] = []
 * @param int[$flag] = 1
 * @return void
 */
function dd(array $info = [], int $flag = 1): void {
    ConfigService::dd($info, $flag);
}

/**
 * @param string[$name_cart]
 * @return array
 */
function getProdutos(string $name_cart): array {
    $data = \Source\Service\LojaService::show_carrinho($name_cart);

    return $data;
}


/**
 * @return bool
 * Metodo responsável por verificar o horários de funcionamento da loja
 * para solicitação de um novo pedido pelo cliente
 */
function inFuncionamento(): bool {
    $horas = (int) date('H');
    $minutos = (int) date('i');

    if($horas > 16 && $horas <= 23){
        if($horas == 22 && $minutos == (59+1)){
            return false;
        }
        return true;
    }

    return false;
}
