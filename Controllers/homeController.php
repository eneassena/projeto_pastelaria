<?php 



/**
 * Controller page home
 */
 // require 'Models/usuario.php';

class homeController extends Controller
{
	public $dados_home;
	public function __construct()
	{
		$this->dados_home = array();
	}

	public function index()
	{
		try 
		{
			  
			$this->carregarTemplate('home', $this->dados_home, "Pastelaria - Home");

		} catch (Exception $e) 
		{
			 
			$this->dados_home['erro'] =$e->getMessage();
			$this->carregarTemplate('pagina-erro', $this->dados_home, "Home");
			
		}	
	}	 
}

 ?>