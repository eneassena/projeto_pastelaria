<?php 


use PHPUnit\Framework\TestCase;
use Source\Models\site\BebidaModel;
use Source\Models\site\CardapioPastelModel;


class ProdutosTest extends TestCase {


    /** 
     * Método realizar caso de uso adicionar produto (pastel)
     */
    public function testCreatePastel()
    {
        $objectResult = (new CardapioPastelModel)->new_cardapio([
            'saborDoPastel' => 'Pastel Test case 3',
            'ingrediente' => 'create sabedoria aqui',
            'valorUnitario' => 30.00
        ]);
        $this->assertTrue($objectResult->success);
    }   

    /** 
     * Método realizar caso de uso editar produto(pastel)
     */
    public function testUpdatePastel()
    {
        $objectResult = (new CardapioPastelModel)->edit_pastel([
            'idPastel' => 75,
            'saborDoPastel' => 'Pastel Test Delete',
            'ingrediente' => 'create sabedoria aqui',
            'valorUnitario' => 70.00
        ]);

        $this->assertTrue($objectResult->success);
    }
 
    
    /**
     * Realizar caso de uso remover produto(pastel)
     */
    public function testDeletePastel()
    {
        // $data = [
        //     (new CardapioPastelModel)->delete_pastel( 69 ),
        //     (new CardapioPastelModel)->delete_pastel( 71 ),
        // ];
        $value = (new CardapioPastelModel)->delete_pastel( 75 );
        $this->assertTrue( $value->success );
    }


    /**
     * Realizar caso de uso adicionar produto(bebida)
     */
    public function testCreateBebida()
    { 
        $objectResult = (new BebidaModel)->create_bebida([
            'tipoDaBebida' => 'Suco Relaxante',
            'sabor' => 'Maracujá',
            'fruto' => 'Polpa',
            'quantidadeEmMl' => '300ML',
            'valorUnidade' => 5.00
        ]);
        $this->assertTrue( $objectResult->success );
    }


    /**
     * Realizar caso de uso editar produto(bebida)
     */
    public function testUpdateBebida()
    {
        $objectResult = (new BebidaModel)->edit_bebida([
            'idBebida' => 30,
            'tipoDaBebida' => 'Suco Relaxante',
            'sabor' => 'Maracujá',
            'fruto' => 'Fruta',
            'quantidadeEmMl' => '300ML',
            'valorUnidade' => 5.00
        ]); 
        $this->assertTrue( $objectResult->success );
    }
        
    /**
     * Realizar caso de uso remover produto(bebida)
     */
    public function testDeleteBebida()
    {
        $resultObject = (new BebidaModel)->delete_bebida( ['idBebida' => 30 ] );
        $this->assertTrue( $resultObject->success );
    }    
}