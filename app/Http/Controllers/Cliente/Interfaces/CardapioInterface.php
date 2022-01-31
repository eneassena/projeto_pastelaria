<?php

namespace App\Http\Controllers\Cliente\Interfaces;


interface CardapioInterface {

    public function adicionar_pasteis(int $id): void;
    public function remover_pasteis(int $id): void;
    public function adicionar_bebidas(int $id): void;
    public function remover_bebidas(int $id): void;

}
