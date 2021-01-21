<?php



/**
 * Controller page home
 */

class ver_pedidoController extends Controller
{
	public $dados_pedido;
	public function __construct()
	{
		try
		{
			$this->dados_pedido = array();
			$this->conexaoCar = new Cardapios();
			$this->dados_pedido['registro_pedido'] = $this->conexaoCar->busca_pedido_feito();
		} catch(Exception $erro)
		{
			$this->dados_pedido['erro']=$erro->getMessage();
		} finally
		{
			Cardapios::$conn = null;
		}
	}

	public function index()
	{
		try
		{
			$this->conexaoCar = new Cardapios();
			$this->dados_pedido['registro_pedido'] = $this->conexaoCar->busca_pedido_feito();
			$this->carregarTemplate('ver_pedido', $this->dados_pedido, "Pastelaria - Ver Pedido");
		} catch (Exception $e)
		{
			$this->dados_pedido['erro'] = $e->getMessage();
			$this->carregarTemplate('pagina-erro', $dados_pedido, "Erro");
		} finally
		{
			Cardapios::$conn = null;
		}
	}
}
?>
