<?php 

require 'lib/database/connexao.php';
/**
 * 
 */
class Usuario
{
     public static $conn;
     
	public static function conexao()
    {
         self::$conn = Connection::getConn();
         return self::$conn;
    }

    public function acesso_cliente($login, $senha)
    {
       try {
            $result = new Usuario();
            $login_html = htmlspecialchars($login);
            $senha_html = md5(htmlspecialchars($senha));
            
            $sql = "CALL PROC_LOGAR_USUARIO(:login, :senha);";
            $sql = Usuario::conexao()->prepare($sql);
            $sql->bindValue(':login', $login_html);
            $sql->bindValue(':senha', $senha_html);
            $sql->execute();
            $result = $sql->fetchobject('Usuario');
             
            return $result;

       } catch (Exception $e) {
            throw new Exception("Nunhum registro encotrado no banco ", 400);
       } finally {
          self::$conn = null;
       }
    }

    public function cadastro_cliente($nome, $telefone, $login, $senha, $complemento, $numero, $bairro)
    {
       try {
               // DADOS DA TABELA CLIENTE
               $nome_html = htmlspecialchars($nome);
               $telefone_html = htmlspecialchars($telefone);
               $login_html = htmlspecialchars($login);
               $senha_html = md5(htmlspecialchars($senha));
               

               // DADOS REFERENTE A TABELA ENDERECO
               $complemento_html = htmlspecialchars($complemento);
               $numero_html = htmlspecialchars($numero);
               $bairro_html = htmlspecialchars($bairro);
               
               // INSERE DADOS NA TABLE CLIENTE E ENDERECO E RETORNA SEUS IDS RESPECTIVO E APLICA RELACIONAMENTO ENDERECO_CLIENTE
               $id_cliente = $this->insere_clientes($nome_html, $telefone_html, $login_html, $senha_html);
               $id_endereco = $this->insere_endereco($complemento_html, $numero_html, $bairro_html);
               
               $query_end_cli = "INSERT INTO endereco_cliente(pk_endereco_cliente,pk_cliente_endereco)
               VALUES('$id_cliente', '$id_endereco');";
               $conn = Usuario::conexao();
               $conn->exec($query_end_cli); 
               
                
       } catch (Exception $e) {
            throw new Exception("Nunhum registro encotrado no banco ", 400);
       } finally {
          self::$conn = null;
       }
    }
    
    protected function insere_clientes($nome, $tel, $log, $pass)
    {
         try 
         {
          $nome_html = htmlspecialchars($nome);
          $tel_html = htmlspecialchars($tel);
          $log_html = htmlspecialchars($log);
          $pass_html = htmlspecialchars($pass);

          $query_cliente = "INSERT INTO cliente(nome_cli, telefone, login_cli, senha_cli)
          VALUES ('$nome_html', '$tel_html', '$log_html', '$pass_html');";
          $conn = Usuario::conexao();
          $conn->exec($query_cliente); 
          $last_id = $conn->lastInsertId();
          return $last_id;
         } catch(Exception $erro) {
              throw new Exception("falha ao inserir dados na tabela cliente");
         } finally {
          self::$conn = null;
       }
    }
    protected function insere_endereco($complemento, $numero, $bairro)
    {
         try 
         {
          $complemento_html = htmlspecialchars($complemento);
          $numero_html = htmlspecialchars($numero);
          $bairro_html = htmlspecialchars($bairro);
          $query_endereco = "INSERT INTO endereco(complemento_end, numero_end, bairro)
          VALUES ('$complemento_html', '$numero_html', '$bairro_html');";
          $conn = Usuario::conexao();
          $conn->exec($query_endereco); 
          $last_id = $conn->lastInsertId();
          return $last_id;

          }catch(Exception $erro) 
          {
               throw new Exception($erro->getMessage());
          } finally {
               self::$conn = null;
          }
     }
     
} 
 ?>