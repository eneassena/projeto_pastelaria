<?php


use \PHPUnit\Framework\TestCase;
use Source\Models\site\User;


final class ClienteTest extends TestCase
{

    /**
     * Teste o metodo de criação de um novo cliente
     *
     * */
   public function testCadastrarCliente()
   {
       $this->user = (new User())->create_user_cliente([
           'nome' => "Marcela Santos" ,
           'celular' => "71956548651" ,
           'bairro' => "Aviário" ,
           'numero' => '456' ,
           'complemento' => "Rua L" ,
           'user_login' => "marcela123" ,
           'user_senha' => "marcela123"
       ]);
       $this->assertTrue( $this->user->success );
   }


    /**
     * Verifica metodo de login do modelo user
     * */
    public function testRealizaLoginCliente() {
        $this->user = (new User())->login([
            'user_login' => "marcela123" ,
            'user_senha' => "marcela123"
        ]);
        $this->assertTrue( $this->user->success );
    }


    /**
     * Método responsável por testar a buscar de um cliente pelo seu identificador
     * e retorna as informações desse cliente caso encontre
     */
    public function testUserLogado() {
        $this->user = (new User())->showUser( 1 );
        $this->assertTrue( $this->user->success );
    }


   /**
    * testando metodo de criação de cliente comun com nome e telefone
    * para pedido retirada
    * */
   public function testCadastrarClienteComunRetirada()
   {
       $this->user = (new User())->create_user_comun([
           'nome' => "Jose Santos" ,
           'telefone' => "7596585654",
           'tipoUsuario' => 'comun'
       ]);
       $this->user->save();
       $this->assertTrue( $this->user->success );
   }

   /**
    * analisa cadastro de cliente do tipo comun
    * metodo usado em solicitação de pedido para entrega
    * */
   public function testCadastrarClienteComunEntrega()
   {
       $this->user = (new User())->create_user_comun([
            'nome' => "Marta Oliveira" ,
            'telefone' => "759865452312" ,
           'tipoUsuario' => 'comun',
       ])->create_endereco_user([
           'bairro' => "Feira X" ,
           'numero' => "46598" ,
           'complemento' => "Rua C"
       ]);
       $this->assertTrue( $this->user->success );
   }
}
