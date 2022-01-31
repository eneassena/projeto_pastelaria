<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cliente\Interfaces\CardapioInterface;
use App\Http\Services\ProdutosService;



class CardapioController extends Controller implements CardapioInterface
{


    /** @var array[$data] */
    private $data;

    public function __construct(){
        $this->init();
    }

    /**
     * @param null
     * @return void
     */
    public function init(): void {
        $this->data['cardapios'] = ProdutosService::cardapio();
        $this->data['bebidas'] = ProdutosService::bebida();
        $this->data['localizacao'] = ProdutosService::localizacao();
    }
    //
    public function homeTemplate() {

        $template = view('cliente.cardapio', $this->data);

        return $template;
    }

    public function adicionar_pasteis(int $id): void {
        //
    }
    public function remover_pasteis(int $id): void {
        //
    }
    public function adicionar_bebidas(int $id): void {
        //
    }
    public function remover_bebidas(int $id): void {
        //
    }
}
