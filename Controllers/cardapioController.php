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
		}  finally {
			Cardapios::$conn = null;
		}
	}


	public function index()
	{

		if(!empty($this->cardapio_dados['cardapio_pastel']) && !empty($this->cardapio_dados['bebidas'])){
			$this->carregarTemplate('cardapio', $this->cardapio_dados, "Pastelaria - Cardapio");
		}  
	}
}

?>
