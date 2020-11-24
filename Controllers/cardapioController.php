<?php 

/**
 * 
 */
class cardapioController extends Controller
{
	public $cardapio_dados;

	public function __construct()
	{
		try
		{
			$objetoCardapio = new Cardapios();
			$this->cardapio_dados = array();
			$this->cardapio_dados['cardapio_pastel'] = $objetoCardapio->consultaCardapio();
			$this->cardapio_dados['bebidas'] = $objetoCardapio->consultaBebidas();		
			 
		} catch(Exception $eh) 
		{
			$this->cardapio_dados['erro'] = $eh->getMessage();
			$this->carregarTemplate('pagina-erro', $this->cardapio_dados, "Pastelaria - Error");
		}  finally {
			Cardapios::$conn = null;
		}
	}


	public function index()
	{
		$this->carregarTemplate('cardapio', $this->cardapio_dados, "Pastelaria - Cardapio");
	}
}
 
?>