<?php 

require 'lib/database/connexao.php';
/**
 * 
 */
class Restrita
{
  public static $conn;



  public static function conexao()
  {
   self::$conn = Connection::getConn();
   return self::$conn;
 } 

    // cadastra pastel
 public function cadastrar_pastel($nome, $ingrediente, $valor)
 {
  try {
               // -- pasteis          
   $sql = "CALL PROC_CADASTRA_PASTEL(:sabor, :ingrediente, :preco);";
   $sql = Restrita::conexao()->prepare($sql);
   $sql->bindValue(':sabor', $nome);
   $sql->bindValue(':ingrediente', $ingrediente);
   $sql->bindValue(':preco', $valor);
   $sql->execute();

 } catch (PDOException $e) {
   throw new Exception("Falha ao acesso no banco de dados", 400); 
 }finally {
   self::$conn = null;
 }
}

     // cadastra bebidas
public function cadastrar_bebidas($tipo_bebida, $sabor, $fruto, $qtd_ml, $valor)
{
 try {
                // -- pasteis          
  $sql = "CALL PROC_CADASTRAR_BEBIDA(:tipo, :sabor, :fruto, :qtd, :preco);";
  $sql = Restrita::conexao()->prepare($sql);
  $sql->bindValue(':tipo', $tipo_bebida);
  $sql->bindValue(':sabor', $sabor);
  $sql->bindValue(':fruto', $fruto);
  $sql->bindValue(':qtd', $qtd_ml);
  $sql->bindValue(':preco', $valor);
  $sql->execute();

} catch (PDOException $e) {
  throw new Exception("Falha ao acesso no banco de dados", 400); 
}finally {
  self::$conn = null;
}
}


    // consulta todos os pasteis de um pedido
public function consulta_pastel_pedido($idcliente)
{
 try {
          // -- pasteis          
  $sql = "CALL PROC_BUSCAR_PASTEL_PEDIDO(:id);";
  $sql = Restrita::conexao()->prepare($sql);
  $sql->bindValue(':id', $idcliente);
  $sql->execute();

  $result = array();

  while($row = $sql->fetchobject('Restrita')) 
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

    // consulta todas as bebidas de um pedido
public function consulta_bebidas_pedido($idcliente)
{
 try {
          // bebidas

  $sql = "CALL PROC_BUSCAR_BEBIDAS_PEDIDO(:id);";
  $sql = Restrita::conexao()->prepare($sql);
  $sql->bindValue(':id', $idcliente);
  $sql->execute();

  $result = array();

  while($row = $sql->fetchobject('Restrita')) 
  {
   $result[] = $row;
 }    

} catch (PDOException $e) {
  throw new Exception("Falha ao acesso no banco de dados", 400); 
} finally {
  self::$conn = null;
}

return $result;
}

    // consulta o cliente que fez um determinado pedido
public function consulta_cliente_pedido($idcliente)
{
 try {

  $sql = "CALL PROC_BUSCAR_CLIENTE(:id);";
  $sql = Restrita::conexao()->prepare($sql);
  $sql->bindValue(':id', $idcliente);
  $sql->execute();

  $result = array();

  while($row = $sql->fetchobject('Restrita')) 
  {
   $result[] = $row;
 }    
} catch (PDOException $e) {
  throw new Exception("Falha ao acesso no banco de dados", 400); 
} finally {
  self::$conn = null;
}

return $result;
}

    // consulta todos os pedidos feito em um dia especifico
public function consulta_pedido_done($idpedido)
{
 try {

  $sql = "call PROC_CONSULTA_PEDIDO_ID(:id);";
  $sql = Restrita::conexao()->prepare($sql);
  $sql->bindValue(':id', (int)$idpedido);
  $sql->execute();

  $result = array();

  while($row = $sql->fetchobject('Restrita')) 
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
     // consulta todos os pedidos feito em um dia especifico
public function consulta_pedido_edit()
{
 try {

  $sql = "select * from vw_exibe_pedido_feito;";
  $sql = Restrita::conexao()->prepare($sql); 
  $sql->execute();

  $result = array();

  while($row = $sql->fetchobject('Restrita')) 
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
    // login do admin


public function edicao_pedido_final($idpedido, $situacao, $taxa_entrega)
{
 try {
  $idpedido = (int)htmlspecialchars($idpedido);
  $situacao = htmlspecialchars($situacao);
  $taxa_entrega = (double)htmlspecialchars($taxa_entrega);
  $sql = "CALL PROC_UP_PEDIDO(:id, :situacao, :taxa_entrega);";
  $sql = Restrita::conexao()->prepare($sql); 
  $sql->bindValue(':id', $idpedido);
  $sql->bindValue(':situacao', $situacao);
  $sql->bindValue(':taxa_entrega', $taxa_entrega);
  $sql->execute();

} catch (PDOException $e) {
  throw new Exception("Falha ao acesso no banco de dados", 400); 
} finally {
  self::$conn = null;
}  

}
public function acesso_admin($login, $senha)
{
  try {
   $log = htmlspecialchars($login);
   $pass = htmlspecialchars($senha);
   $conn = Restrita::conexao();
   $query_admin = "SELECT * FROM admin WHERE login = :l AND senha = :s;";
   $sql = $conn->prepare($query_admin);
   $sql->bindValue(':l', $log);
   $sql->bindValue(':s', $pass);
   $sql->execute();

   $result = array();

   while($row = $sql->fetchobject('Restrita')) 
   {
    $result[] = $row;
  }
  return $result;

} catch(Exception $erro) {
 throw new Exception($erro->getMessage());
} finally {
 self::$conn = null;
}  
}

     // consulta registro da tabela cardapio
public function consultaCardapio()
{

  try {

   $sql = "SELECT * FROM vw_consulta_cardapio ORDER BY nome ASC;";
   $sql = Restrita::conexao()->prepare($sql);
   $sql->execute();

   $result = array();

   while($row = $sql->fetchobject('Restrita')) 
   {
    $result[] = $row;
  }    
} catch (PDOException $e) {
 throw new Exception("Falha ao acesso no banco de dados", 400);            
} finally {
 self::$conn = null;
}

if(!$result){
 throw new Exception("Não foi encontrado nunhum registro no banco ", 400);
} else 
{ 
  return $result;
}
}

public function consultaBebidas()
{   
  try {

    $sql = "SELECT * FROM vw_consulta_bebidas ORDER BY tipo_bebida ASC;";
    $sql = Restrita::conexao()->prepare($sql);
    $sql->execute();

    $result = array();

    while($row = $sql->fetchobject('Restrita')) {
     $result[] = $row;
   }    
 } catch (PDOException $e) {
   throw new Exception("Falha ao acesso no banco de dados", 400);   
 }  finally  {
   self::$conn = null;
 }

 if(!$result) {
   throw new Exception("Não foi encontrado nunhum registro no banco ", 400);
 } else { 
   return $result;
 }
} 

     /*
     * funções de atualização de pastéis e bebidas
     */
     
     public function consulta_pastel_por_id($id)
     {   
      try {

        $sql = "CALL PROC_SEL_PASTEL_ID(:id);";
        $sql = Restrita::conexao()->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        $result = array();

        while($row = $sql->fetchobject('Restrita')) {
         $result[] = $row;
       }    
     } catch (PDOException $e) {
       throw new Exception("Falha ao acesso no banco de dados", 400);   
     }  finally  {
       self::$conn = null;
     }

     if(!$result) {
       throw new Exception("Não foi encontrado nunhum registro no banco ", 400);
     } else { 
       return $result;
     }
   }

   public function cad_cardapio_pastel($id, $sabor, $ingrediente, $valor)
   {   
    try {

      $sql = "CALL PROC_UP_PASTEL(:id_update, :sabor, :ingred, :valor);";
      $sql = Restrita::conexao()->prepare($sql);
      $sql->bindValue(':id_update', $id);
      $sql->bindValue(':sabor', $sabor);
      $sql->bindValue(':ingred', $ingrediente);
      $sql->bindValue(':valor', $valor);
      $sql->execute();
      return "Pastel ".$sabor." editado.";

    } catch (PDOException $e) {
     throw new Exception("Falha ao acesso no banco de dados", 400);   
   }  finally  {
     self::$conn = null;
   }
 }


 public function consulta_bebida_por_id($id)
 {   
  try {

    $sql = "CALL PROC_SEL_BEBIDA_ID(:id);";
    $sql = Restrita::conexao()->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();

    $result = array();

    while($row = $sql->fetchobject('Restrita')) {
     $result[] = $row;
   }    
 } catch (PDOException $e) {
   throw new Exception("Falha ao acesso no banco de dados", 400);   
 }  finally  {
   self::$conn = null;
 }

 if(!$result) {
   throw new Exception("Não foi encontrado nunhum registro no banco ", 400);
 } else { 
   return $result;
 }
}
public function cad_bebida($id, $tipo, $sabor, $fruto, $qtd_ml, $valor)
{   
  try {

    $sql = "CALL PROC_UP_BEBIDA(:id, :tipo, :sabor, :fruto, :qtd_ml, :valor);";
    $sql = Restrita::conexao()->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->bindValue(':tipo', $tipo);
    $sql->bindValue(':sabor', $sabor);
    $sql->bindValue(':fruto', $fruto);
    $sql->bindValue(':qtd_ml', $qtd_ml);
    $sql->bindValue(':valor', $valor);
    $sql->execute(); 
    return "Bebida adicionada";

  } catch (PDOException $e) {
   throw new Exception("Falha ao acesso no banco de dados", 400);   
 }  finally  {
   self::$conn = null;
 } 
}
public function cadastra_administrador($nome, $login, $senha)
{   
  try {
   $nome = htmlspecialchars($nome);
   $login = htmlspecialchars($login);
   $senha = md5(htmlspecialchars($senha));
   $query_adm = "CALL PROC_INSERT_AMD(:nome, :login, :senha);";
   $query_adm = Restrita::conexao()->prepare($query_adm);
   $query_adm->bindValue(':nome', $nome);
   $query_adm->bindValue(':login', $login);
   $query_adm->bindValue(':senha', $senha); 
   $query_adm->execute(); 
   return "admin cadastrado com sucesso";

 } catch (PDOException $e) {
   throw new Exception("Falha ao cadastra um administrador", 400);   
 }  finally  {
   self::$conn = null;
 } 
}

     // exclui registro da tabela cardapio pastel
public function detela_cardapio_pastel($id)
{
  try {

    $conexao = Restrita::conexao();
    $query_cardapio_pastel = "SELECT * FROM cardapio_pastel WHERE id_cardapio_card = :id";
    $stmt = $conexao->prepare($query_cardapio_pastel);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
    if(!$stmt->fetch())
    {
      return "Pastel já foi excluido";
    } else 
    {
      $query_cardapio_pastel = "CALL PROC_DEL_CARDAPIO_PASTEL(:id);";
      $stmt = $conexao->prepare($query_cardapio_pastel);
      $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
      $stmt->execute();
      return "Pastel excluido, acesse novamente a area de 'Adicionar Pastel' para visualizar a tabela de pastéis!";
    }


  } catch (Exception $e) 
  {
   throw new Exception("Falha ao delete registros da tabela pedido");
 }  finally  
      { // close conexao;
       self::$conn = null;
     } 
   }

   public function detela_bebida($id){
    try { 

      $conexao = Restrita::conexao();
      $query_cardapio_bebida = "SELECT * FROM bebidas WHERE id_bebida = :id;";
      $stmt = $conexao->prepare($query_cardapio_bebida);
      $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
      $stmt->execute();
      if(!$stmt->fetch())
      {
        return "Bebida já foi excluida";
      } else 
      {
        $query_cardapio_bebida = "CALL PROC_DEL_BEBIDAS(:id);";
        $stmt = $conexao->prepare($query_cardapio_bebida);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return "Bebida excluida, acesse novamente a area de 'Adicionar Bebida' para visualizar a tabela de bebidas!";
      }

    } catch (Exception $e) {
     throw new Exception("Falha ao deletar registro na tabela bebidas");
   }  finally {
     self::$conn = null;
   } 
 }

 public function deleta_pedido($idpedido){

  try { 

    $conexao = Restrita::conexao();
    $query_cardapio_bebida = "CALL PROC_DEL_PEDIDO(:id);";
    $stmt = $conexao->prepare($query_cardapio_bebida);
    $stmt->bindValue(':id', (int)$idpedido, PDO::PARAM_INT);
    $stmt->execute();

  } catch (Exception $e) {
    throw new Exception("Falha ao deletar registro na tabela pedido");
  }  finally {
   self::$conn = null;
 } 
}

// este metodo exclui todo os pedido existente na tabela
public function deleteAll_pedidos(){

  
  try { 
    $return = array();
    $conexao = Restrita::conexao();
    $query_cardapio_bebida = "SELECT * FROM pedido;";
    $stmt = $conexao->prepare($query_cardapio_bebida);
    $stmt->execute();
  
    while($row = $stmt->fetchobject("Restrita")) 
    {
      $return[] = $row;
    }
    
    foreach ($return as $chave => $value) { 
      $query_cardapio_bebida = "CALL PROC_DEL_PEDIDO(:id);";
      $stmt = $conexao->prepare($query_cardapio_bebida);
      $stmt->bindValue(':id', (int)$value->id_pedido, PDO::PARAM_INT);
      $stmt->execute();
    }
  
  } catch (Exception $e) {
    throw new Exception("Falha ao deletar todos os registro na tabela pedido");
  }  finally {
   self::$conn = null;
 }
}


} 
?>