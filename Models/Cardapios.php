<?php


require 'lib/database/connexao.php';


class Cardapios {
    public static $conn;

    public function __construct()
    {
       self::$conn = Connection::getConn();
    }

    public static function getConnection(){
        self::$conn = Connection::getConn();
        return self::$conn;
    }
    public static function close()
    {
        self::$conn = null;
    }

    public function buscar_cliente_por_id($idCliente){
        try {
            $sql = "CALL PROC_BUSCAR_POR_ID(:id);";
            $sql = Cardapios::getConnection()->prepare($sql);
            $sql->bindValue(':id', $idCliente);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchobject('Cardapios'))
            {
                $result[] = $row;
            }
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Falha ao buscar registro do cliente no banco[L32]", 400);
        } finally {
            self::$conn = null;
        }
    }

    // consulta registro da tabela cardapio
    public function consultaCardapio()
	   {

       try
       {
          $result = array();
          $sql = "SELECT * FROM vw_consulta_cardapio ORDER BY valor_unidade ASC, nome ASC;";
          $sql = Cardapios::getConnection()->prepare($sql);
          $sql->execute();
          while($row = $sql->fetchobject('Cardapios'))
          {
              $result[] = $row;
          }
        } catch (PDOException $e) {
            throw new Exception("Falha ao acesso no banco de dados", 400);
        } finally {
            self::$conn = null;
        }

        if(!$result){
            throw new Exception("Falha ao buscar dados na VIEW vw_consulta_cardapio[L60]", 400);
        } else
        {
            return $result;
        }
    }

    public function consultaBebidas()
    {
        try {

            $sql = "SELECT * FROM vw_consulta_bebidas order by tipo_bebida asc, sabor asc, fruto asc;";
            $sql = Cardapios::getConnection()->prepare($sql);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchobject('Cardapios'))
            {
                $result[] = $row;
            }
        } catch (PDOException $e) {
            throw new Exception("Falha ao executar consulta na VIEW vw_consulta_bebidas", 400);
        }  finally {
            self::$conn = null;
        }

        if(!$result){
            throw new Exception("Não foi encontrado nunhum registro no banco ", 400);
        } else
        {
            return $result;
        }
    }

    public function insere_clientes($nome, $telefone)
    {
        try {
            $n = htmlspecialchars($nome);
            $t = htmlspecialchars($telefone);

            $query_cliente = "CALL PROC_CADASTRA_CLIENTE_TESTE(:nome, :tel);";
            $conn = Cardapios::getConnection();
            $query_cliente = $conn->prepare($query_cliente);
            $query_cliente->bindValue(":nome", $n);
            $query_cliente->bindValue(":tel", $t);
            $query_cliente->execute();

            $result_cliente = array();
            $result_cliente = $query_cliente->fetchAll();
            $last_id = (int)$result_cliente[0]['id_cliente'];
            return $last_id;

        } catch (PDOException $e) {
            throw new Exception("Falha ao acesso no banco de dados", 400);
        } finally {
            self::$conn = null;
        }
    }
    // insere endereço do cliente na tabela endereco
    public function insere_endereco_cli($complemento, $numero, $bairro, $idCliente)
    {
        try{
            $comp = htmlspecialchars($complemento);
            $num = htmlspecialchars($numero);
            $bairro_cli = htmlspecialchars($bairro);
            $id_cli = (int)$idCliente;

            $conn = Cardapios::getConnection();
            $query_endereco_cliente = "CALL PROC_INSERE_ENDERECO_CLIENTE(:complemento, :numero, :bairro, :idCli);";
            $query_endereco_cliente = $conn->prepare($query_endereco_cliente);
            $query_endereco_cliente->bindValue(':complemento', $comp);
            $query_endereco_cliente->bindValue(':numero', $num);
            $query_endereco_cliente->bindValue(':bairro', $bairro_cli);
            $query_endereco_cliente->bindValue(':idCli', $id_cli);
            $query_endereco_cliente->execute();


        } catch(Exception $erro){
            throw new Exception("Falha na inserçao da tabela insere_endereco_cli", 400);
        } finally {
            self::$conn = null;
        }

    }

    // insere pasteis na tabela pastel
    public function insere_pastel($sabor, $valor, $qtd, $pk_cardapio)
    {

        try{
            $sabor = htmlspecialchars($sabor);
            $valor = htmlspecialchars($valor);
            $qtd_pastel = htmlspecialchars($qtd);
            $pk_cardapio = htmlspecialchars($pk_cardapio);
            $sql = "INSERT INTO pastel(sabor_pastel, valor_unidade, qtd_pastel, pk_cardapio_pastel)
            VALUES ('$sabor', '$valor', '$qtd_pastel', '$pk_cardapio');";
            $conn = Cardapios::getConnection();
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();

            return $last_id;
        }catch(Exception $erro){
            throw new Exception("falha ao inserir registro na tablea pastel", 400);
        } finally {
            self::$conn = null;
        }

    }
    // insere o pedido do cliente
    public function insere_pedido($total, $forma_entrega, $pk_cliente)
    {
        try {
            $taxa_pedido = (float)0;
            $sql = "INSERT INTO pedido(valor_total, forma_entrega, situacao, data_pedido, taxa_entrega, pk_cliente)
            VALUES ('$total', '$forma_entrega', default, curdate(), '$taxa_pedido','$pk_cliente');";
            $conn = Cardapios::getConnection();
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            return $last_id;
        } catch(Exception $erro){
            throw new Exception("falha ao inserir pedido do cliente");
        } finally {
            self::$conn = null;
        }

    }

    // insere registro na tabela pedido_pastel
    public function insere_pedido_pastel($pk_pastel, $pk_pedido)
    {
        try
        {

            $pedido = (int)htmlspecialchars($pk_pedido);
            $pastel = (int)htmlspecialchars($pk_pastel);
            $sql = "INSERT INTO pedido_pastel(pk_pedido_pastel, pk_pastel_pedido)
            VALUES('$pastel', '$pedido');";
            $conn = Cardapios::getConnection();
            $conn->exec($sql);
        } catch(Exception $erro)
        {
            throw new Exception("falha ao inserir pedio_pastel");
        } finally {
            self::$conn = null;
        }

    }


    // insere registro na tabela pedido_bebida
    public function insere_pedido_bebidas($qtd, $pk_bebida, $pk_pedido)
    {

        try
        {
            $quantidade = (int)htmlspecialchars($qtd);
            $pedido = (int)htmlspecialchars($pk_pedido);
            $bebida = (int)htmlspecialchars($pk_bebida);
            $query_bebida = "CALL PROC_IN_PEDIDO_BEBIDA(:quantidade, :bebida, :pedido);";
            $query_bebida = $conn = Cardapios::getConnection()->prepare($query_bebida);
            $query_bebida->bindValue(':quantidade', $quantidade, PDO::PARAM_INT);
            $query_bebida->bindValue(':bebida', $bebida, PDO::PARAM_INT);
            $query_bebida->bindValue(':pedido', $pedido, PDO::PARAM_INT);
            $query_bebida->execute();

        } catch (PDOException $e)
        {
            throw new Exception("Falha ao inserir bebidas", 400);
        } finally {
            self::$conn = null;
        }
    }


    // insere registro na tabela forma_pagamento
    public function insere_forma_pagamento($cart, $saldo, $pk_pedido)
    {
        try
        {
            $pagamento = htmlspecialchars($cart);
            $valor_caixa = htmlspecialchars($saldo);
            $pedido = htmlspecialchars($pk_pedido);
            $sql = "INSERT INTO forma_pagamento(cartao, saldo_pagar, pk_tbpedido) VALUES ('$pagamento', '$valor_caixa', '$pedido');";
            $sql = Cardapios::getConnection()->prepare($sql);
            $sql->execute();

        } catch (PDOException $e)
        {
            throw new Exception("Falha ao acesso no banco de dados", 400);
        } finally {
            self::$conn = null;
        }
    }

    public function busca_pedido_feito()
	{

		try {

            $sql = "SELECT * FROM vw_exibe_pedido_feito;";
            $sql = Cardapios::getConnection()->prepare($sql);
            $sql->execute();

            $result = array();

            while($row = $sql->fetchobject('Cardapios'))
            {
                $result[] = $row;
            }
        } catch (PDOException $e) {
            throw new Exception("Falha ao acesso no banco de dados", 400);
        }finally {
            self::$conn = null;
        }

        return $result;
    }

    // funcção busca todos os bairros de entrega e retorna um array()
    // SELECT nome_bairro FROM vw_consulta_bairros;
    public function busca_bairro_entrega()
  	{

  		try {

              $sql = "SELECT nome_bairro FROM vw_consulta_bairros order by nome_bairro asc;";
              $sql = Cardapios::getConnection()->prepare($sql);
              $sql->execute();

              $result = array();

              while($row = $sql->fetchobject('Cardapios'))
              {
                  $result[] = $row;
              }
          } catch (PDOException $e) {
              throw new Exception("Falha ao acesso no banco de dados", 400);
          }finally {
              self::$conn = null;
          }
          return $result;
      }
}
