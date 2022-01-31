<?php


namespace App\Http\Services;

use App\Models\Cardapio;
use App\Models\Bebidas;
use App\Models\Localizacao;


class ProdutosService
{
    /**
     * Retorna todos cardapios cadastrado na base de dados
     */
    public static function cardapio()
    {
        $cardapios = Cardapio::all();

        return $cardapios;
    }

    /**
     * Retorna todas bebidas cadastradas na base de dados
     */
    public static function bebida()
    {
        $bebida = Bebidas::all();

        return $bebida;
    }


    /**
     * Retorna todas localizações/bairros de entrega, cadastrados na base de dados
     */
    public static function localizacao()
    {
        $localizacao = Localizacao::all();

        return $localizacao;
    }
}
