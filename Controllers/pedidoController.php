<?php
/**
 *
 */
class pedidoController extends Controller
{
	public $informacao;

	public function __construct()
	{
		$this->informacao = array();
		try
		{
			$objetoCardapio = new Cardapios();
			$this->informacao['cardapio_pastel'] = $objetoCardapio->consultaCardapio();
			$this->informacao['bebidas'] = $objetoCardapio->consultaBebidas();
			$this->informacao['registro_pedido'] = $objetoCardapio->busca_pedido_feito();

			$this->informacao['bairro_entrega'] = $objetoCardapio->busca_bairro_entrega();
			if(isset($_SESSION['cliente']))
			{
				$this->informacao['cliente_logado'] = $objetoCardapio->buscar_cliente_por_id((int)$_SESSION['cliente']['id']);
			}

		} catch (Exception $e)
		{
			$this->informacao['erroDB'] = $e->getMessage();
		} finally {
			Cardapios::close();
		}

	}

	// method de iniciação da pagina
	public function index()
	{

		$this->carregarTemplate('pedido', $this->informacao, "Pastelaria - Pedido");
	}

	// adiciona pasteis no carrinho de pastel
	public function adicionar_pasteis($id)
	{
		$limite = 100;
		if(!isset($_SESSION['carrinho_pastel']))
		{
			$_SESSION['carrinho_pastel'] = array();
		}
		if(isset($_SESSION['carrinho_pastel']))
		{
			if(!isset($_SESSION['carrinho_pastel'][$id]))
			{
				$_SESSION['carrinho_pastel'][$id] = 1;
				$this->informacao['messagem_pastel'] = "Pastel adicionado!";
			} else {
				if($_SESSION['carrinho_pastel'][$id] < $limite){
					$_SESSION['carrinho_pastel'][$id] += 1;
					$this->informacao['messagem_pastel'] = "+ 1 Unidade do pastel foi adicionada!";
				} else {

					$this->informacao['messagem_pastel'] = "Atenção, você adicionou o limite maximo de pastéis que é ".$limite."!";
				}
			}
		}
		$this->index();

	}

	// remove pasteis do item de pastel
	public function remover_pasteis($id)
	{
		if(isset($_SESSION['carrinho_pastel'])){
			if(count($_SESSION['carrinho_pastel']) > 0)
			{
				if(isset($_SESSION['carrinho_pastel'][$id]))
				{
					if($_SESSION['carrinho_pastel'][$id] > 0)
					{
						$_SESSION['carrinho_pastel'][$id] -= 1;
						$this->informacao['messagem_pastel'] = "1 Unidade de pastel removida da cesta!";
					}
					if($_SESSION['carrinho_pastel'][$id] == 0){
						unset($_SESSION['carrinho_pastel'][$id]);
						$this->informacao['messagem_pastel'] = "Pastel removido da cesta!";
					}
				} else {
					$this->informacao['messagem_pastel'] = "Este pastel ainda não existe na cesta!";
				}
			}  else {
				$this->informacao['messagem_pastel'] = "Cesta vasia, impossivel excluir pastel!";
			}

		}
		$this->index();
	}
	// adiciona bebidas do item de bebidas
	public function adicionar_bebidas($id)
	{
		if(!isset($_SESSION['carrinho_bebidas']))
		{
			$_SESSION['carrinho_bebidas'] = array();
		}
		if(isset($_SESSION['carrinho_bebidas'])){

			if(!isset($_SESSION['carrinho_bebidas'][$id]))
			{
				$_SESSION['carrinho_bebidas'][$id] = 1;
				$this->informacao['messagem_pastel'] = "bebida adicionada!";
			} else {
				$_SESSION['carrinho_bebidas'][$id] += 1;
				$this->informacao['messagem_pastel'] = "+ 1 Unidade de bebida adicionada!";
			}
		}

		$this->index();
	}

	// remove bebidas do item de bebidas
	public function remover_bebidas($id)
	{
		if(isset($_SESSION['carrinho_bebidas']))
		{
			if(count($_SESSION['carrinho_bebidas']) > 0)
			{
				if(isset($_SESSION['carrinho_bebidas'][$id]))
				{
					if($_SESSION['carrinho_bebidas'][$id] > 0)
					{
						$_SESSION['carrinho_bebidas'][$id] -=  1;
						$this->informacao['messagem_pastel'] = "1 Unidade de bebida removida!";
					}
					if($_SESSION['carrinho_bebidas'][$id] == 0 || empty($_SESSION['carrinho_bebidas'][$id])){
						unset($_SESSION['carrinho_bebidas'][$id]);
						$this->informacao['messagem_pastel'] = "bebida removida!";
					}
				} else {
					$this->informacao['messagem_pastel'] = "Esta bebida ainda não existe na cesta, para ser excluida!";
				}
			}
		} else {
			$this->informacao['messagem_pastel'] = "Cesta vasia, impossivel excluir bebida!";
		}
		$this->index();
	}

}
?>
