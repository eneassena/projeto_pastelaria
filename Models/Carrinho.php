<?php 
require 'lib/database/connexao.php';


/**
 * 
 */
class Carrinho
{

	public static function conexao()
    {
        return Connection::getConn();
    }

    public function index() {
        
    }

    public function remove_pedido($id)
    {
       try {
            // tabela pedido_pastel
            $sql = "delete from pedido_pastel where pk_pastel_pedido= :id";
            $sql = Carrinho::conexao()->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            // tabela pedido_bebida
            $sql = "delete from pedido_bebida where pk_bebida_pedido = :id;";
            $sql = Carrinho::conexao()->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            // tabela forma_pagamento
            $sql = "delete from forma_pagamento where pk_tbpedido = :id;";
            $sql = Carrinho::conexao()->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            // tabela pedido
            $sql = "delete from pedido where id_pedido= :id;";
            $sql = Carrinho::conexao()->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
       } catch (Exception $e) {
            throw new Exception("Nunhum registro encotrado com o id {$id} no banco ", 400);
       }


    }
}

  
 ?>
