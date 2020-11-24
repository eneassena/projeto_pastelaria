<?php 



/**
 * Controller page home
 */

class cadastroController extends Controller
{   private $nome;
    private $telefone;
    private $numero;
    private $complemento;
    private $bairro;
    private $login;
    private $senha;

	public $dados_home;
	public function __construct()
	{
		$this->dados_cadastro = array();
	}

	public function index()
	{
		$this->carregarTemplate('cadastro', $this->dados_cadastro, "Pastelaria - cadastro");		
    }
    
    public function logout(){
        
        if(isset($_SESSION['cliente']))
        {
            unset($_SESSION['cliente']);
            $this->dados_cadastro['msg_acesso'] = "Usuário acabou de efetuar o lagout da sua conta!"; 

        } elseif(isset($_SESSION['admin']))
        {
            unset($_SESSION['admin']);
        }

        $this->carregarTemplate('home', $this->dados_cadastro, "Pastelaria - Home");
    }

	 
    
    public function cadastrar_cliente()
    {
        if(isset($_POST['cdNome']) && !empty($_POST['cdNome']))
        {
            // dados da tabela cliente
            $this->nome = htmlspecialchars($_POST["cdNome"]); // nome
         
            if( isset($_POST["cdPhone"]) && !empty($_POST['cdPhone']) ) { // telefone
                $this->telefone = htmlspecialchars($_POST["cdPhone"]);
            }
            if( isset($_POST["cdLogin"]) && !empty($_POST['cdLogin']) ) { // login
                $this->login = htmlspecialchars($_POST["cdLogin"]);
            }
            if( isset($_POST["cdSenha"]) && !empty($_POST['cdSenha']) ) { // senha
                $this->senha = htmlspecialchars($_POST["cdSenha"]);
            }

            // dados da tabela endereco
            if( isset($_POST["cdComplemento"]) && !empty($_POST["cdComplemento"]) ) { // complemento
                $this->complemento = htmlspecialchars($_POST["cdComplemento"]);
            }
            if(isset($_POST["cdNumero"]) && !empty($_POST["cdNumero"]) ) { // numero
                $this->numero = htmlspecialchars($_POST["cdNumero"]);
            }
            if( isset($_POST["cdBairro"]) && !empty($_POST["cdBairro"]) ) { // bairro
                $this->bairro = htmlspecialchars($_POST["cdBairro"]);
            }

            try 
            {   
                $user = new Usuario();
                $user->cadastro_cliente($this->nome, $this->telefone, $this->login, $this->senha, $this->complemento, $this->numero, $this->bairro);
                $this->dados_cadastro['boas_vindas'] = "cadastro realizado com sucesso!";
            } catch(Exception $erro)
            {
                $this->dados_home['error'] = "falha ao cadastra cliente";
            } finally {
                $user = null; // close Connection
            }
            
            $this->index();
            
        } else {
            $this->dados_cadastro['dados_incorreto'] = "preencha todos os campos corretamente para se cadastrar!";
            $this->carregarTemplate('home', $this->dados_cadastro, "Pastelaria - Home");
        }
		
	}

	// efetua o login dos usuários/clientes
	public function login_cliente(){
		try{
            
            $user = new Usuario(); 
			if( isset($_POST['cUser']) && !empty($_POST['cUser']) || 
                isset($_POST['cPass']) && !empty($_POST['cPass']) ){ 
                $user_html = htmlspecialchars($_POST['cUser']);
                $pass_html = htmlspecialchars($_POST['cPass']);
                $res = $user->acesso_cliente($user_html, $pass_html);
                
                if($res)
                { 
                    $_SESSION['cliente'] = array( 'id' => $res->id_cliente );

                    $this->dados_cadastro['msg_acesso'] = "login executado com sucesso!"; 
                    
                } else {
                    $this->dados_cadastro['msg_acesso'] = "usuario invalido!";  
                }
                $this->carregarTemplate('home', $this->dados_cadastro, "Pastelaria - Home");
                  
			} else {
                
                if(!isset($_SESSION['cliente']))
                {
                    $this->dados_cadastro['msg_acesso'] = "Os campos deve ser preenchido para efetuar login!"; 
                }

                $this->carregarTemplate('home', $this->dados_cadastro, "Pastelaria - cadastro");
			}
		} catch(Exception $errodb){
            $this->dados_cadastro['msg_acesso'] = $errodb->getMessage();
            $this->carregarTemplate('home', $this->dados_cadastro, "Pastelaria - Home");
		} finally{
			$user = null; // close connection
		}
		
	}	 
}
 ?>