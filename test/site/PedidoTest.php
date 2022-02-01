<?php


use \Source\Models\site\PedidoModel;

final class PedidoTest extends \PHPUnit\Framework\TestCase
{


    public function testSolicitacaoPedidoRetirada()
    {
        // Array
        // (
        //     [idUser] =>
        //     [nome] => Cliente 1 Comun
        //     [telefone] => 2334123324
        //     [bairro] =>
        //     [numero] =>
        //     [complemento] =>
        //     [forma_pagamento] => Dinheiro
        //     [forma_entrega] => Retirada
        // )
        $data = [
            'idUser' => '',
            'nome' => 'Cliente 1 Comun',
            'telefone' => '2334123324',
            'bairro' => '',
            'numero' => '',
            'complemento' => '',
            'forma_pagamento' => 'Dinheiro',
            'forma_entrega' => 'Retirada'
        ];
        $pedidoModel = (new PedidoModel())->createNew($data);

        $this->assertTrue( $pedidoModel->success );
    }

    public function testSolicitacaoPedidoEntrega()
    {

        // Array
        // (
        //     [idUser] =>
        //     [nome] => Cliente 2
        //     [telefone] => 23413223413
        //     [bairro] => Santa Monica
        //     [numero] => 12233
        //     [complemento] => Centro
        //     [forma_pagamento] => Cartão
        //     [forma_entrega] => Entrega
        // )
        $data = [
            'idUser' => '',
            'nome' => 'Cliente 2',
            'telefone' => '23413223413',
            'bairro' => 'Santa Monica',
            'numero' => '12233',
            'complemento' => 'Centro',
            'forma_pagamento' => 'Cartão',
            'forma_entrega' => 'Entrega'
        ];

        $pedidoModel = (new PedidoModel())->createNew($data);

        $this->assertTrue( $pedidoModel->success );
    }


}
