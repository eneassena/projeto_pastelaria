<?php


use PHPUnit\Framework\TestCase;
use Source\Models\site\PedidoModel;

class AreaRestritaTest extends TestCase
{

    /**
     * Método responsável por realizar caso de teste solicitação de pedido
     * Tipo: Retirada
     */
    public function testEnvioPedidoRetirada()
    {
        $data = (new PedidoModel)->createNew([
            'idUser'            => '53',
            'nome'              => 'User teste 01',
            'telefone'          => '7595654658',
            'bairro'            => '',
            'numero'            => '',
            'complemento'       => '',
            'user_login'        => '',
            'user_senha'        => '',
            'forma_pagamento'   => 'Cartão',
            'forma_entrega'     => 'Retirada',
            'valor_total'       => '28.00',
        ]);

        $this->assertTrue($data->success);
        $this->assertTrue($data instanceof PedidoModel);
    }
    /**
     * Método responsável por realizar caso de teste solicitação de pedido
     * Tipo: Entrega
     */
    public function testEnvioPedidoEntrega()
    {
        $data = (new PedidoModel)->createNew([
            'idUser'            => '54',
            'nome'              => 'User teste 02',
            'telefone'          => '71956452356',
            'bairro'            => 'Jardim Cruzeiro',
            'numero'            => '652',
            'complemento'       => 'Mercadinho Principal',
            'user_login'        => 'teste123',
            'user_senha'        => '123456789',
            'forma_pagamento'   => 'Dinheiro',
            'forma_entrega'     => 'Entrega',
            'valor_total'       => '35.00',
        ]);

        $this->assertTrue($data->success);
        $this->assertTrue($data instanceof PedidoModel);
    }
    /**
     * Método responsável por realizar caso de teste busca de pedido
     */
    public function testBuscarPedidos()
    {
        $data = (new PedidoModel)->ver_pedido();
        $this->assertTrue(is_array($data));

        $this->assertTrue(count($data) > 0);
    }
    /**
     * Método responsável por buscar informações do pedido 
     */
    public function testBuscarPedidosDetalhado()
    {
        $data = (new PedidoModel)->find("idPedido=:p", "p=33")->fetch();

        $resultPedidoDetails = $data->buscarPedidoDetalhado();

        $this->assertTrue($resultPedidoDetails->success);
    }
}
