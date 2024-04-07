<?php

use Source\Service\PedidoService;

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
function calcular_total_item(float $valor, float $quantidade)
{
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
function formata_precos($preco = ''): string
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
function valida_pastels(string $recurso = '')
{
    $return = false;

    if (!inFuncionamento()) return false;

    if (isset($_SESSION['cart'][$recurso])) {
        $total = 0;
        foreach ($_SESSION['cart'][$recurso] as $id_item => $value) {
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
function user_load()
{
    return (new PedidoService)->user_logado();
}




/**
 * @param string[$name_cart]
 * @return array
 */
function getProdutos(string $name_cart): array
{
    $data = \Source\Service\LojaService::show_carrinho($name_cart);

    return $data;
}


/**
 * @return bool
 * Metodo responsável por verificar o horários de funcionamento da loja
 * para solicitação de um novo pedido pelo cliente
 */
function inFuncionamento(): bool
{
    // $horas = (int) date('H');
    // $minutos = (int) date('i');

    // if ($horas > 16 && $horas <= 23) {
    //     if ($horas == 22 && $minutos == (59 + 1)) {
    //         return false;
    //     }
    //     return true;
    // }

    return true;
}
