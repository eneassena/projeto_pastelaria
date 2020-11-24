<?php 
/**
 * 
 */
class sobreController extends Controller
{
	public $dados_sobre;
	
	public function __construct()
	{
		$this->dados_sobre = array();
	}

	function index()
	{
		$this->carregarTemplate('sobre', $this->dados_sobre, "Pastelaria - Sobre");
	}
}

?>