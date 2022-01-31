<?php


namespace App\Http\Controllers\Cliente\Interfaces;


interface InterfaceCliente {

    public function logout():void;
    public function cadastrar_cliente():void;
    public function login_cliente():void;
}
