<?php
/**
 *
 */
class carrinhoController extends Controller
{
	private $nome 			 = null;
	private $celular 		 = null;
	private $complemento 	 = null;
	private $numero 		 = null;
	private $bairro 		 = null;
	private $forma_pagamento = null;
	private $forma_entrega   = null;
	public $carrinho_dados;

	public function __construct()
	{
		try
		{
			$this->carrinho_dados = array();
			$this->conexaoCar = new Cardapios();
			$this->carrinho_dados['cardapio_pastel'] = $this->conexaoCar->consultaCardapio();
			$this->carrinho_dados['bebidas'] = $this->conexaoCar->consultaBebidas();
			$this->carrinho_dados['registro_pedido'] = $this->conexaoCar->busca_pedido_feito();
		} catch(Exception $eh)
		{
			$this->index();
		} finally {
    	Cardapios::$conn = null;
    }
	}

	// metodo main
	public function index()
	{
		try {
			$this->conexaoCar = new Cardapios();
			$this->carrinho_dados['cardapio_pastel'] = $this->conexaoCar->consultaCardapio();
			$this->carrinho_dados['bebidas'] = $this->conexaoCar->consultaBebidas();
			$this->carrinho_dados['registro_pedido'] = $this->conexaoCar->busca_pedido_feito();
			$this->carregarTemplate('ver_pedido', $this->carrinho_dados, "Pastelaria - Pedido");
		} catch(Exception $erro) {

		}  finally {
            Cardapios::$conn = null;
        }

	}

	public function calculador_caixa()
	{
		$total_pastel = 0;
		$total_bebida = 0;

		// calculando o valor total dos pasteis
		if( isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel']) > 1 )
		{
			foreach($_SESSION['carrinho_pastel'] as $chave => $quantidade) {

				foreach($this->carrinho_dados['cardapio_pastel'] as $field => $value){
					if($chave == $value->id_cardapio) {
						$total_pastel += $value->valor_unidade * $quantidade;
					}
				}
			}

		}  elseif(isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel']) > 0 )
		{
			foreach($_SESSION['carrinho_pastel'] as $chave => $quantidade){
				if($quantidade >= 2){
					foreach($this->carrinho_dados['cardapio_pastel'] as $field => $value) {
						if($chave == $value->id_cardapio) {
							$total_pastel += $value->valor_unidade * $quantidade;
						}
					}
				} else {
					$this->carrinho_dados['messagem_pastel'] = "Para fazer  pedido deve ter no minino 2 pásteis no carrinho!";
					$this->carregarTemplate('pedido', $this->carrinho_dados, "Pastelaria - Pedido");
				}
			}
		} else
		{
			$this->carrinho_dados['messagem_pastel'] = "Escolha um pastel para finalizar seu pedido!";
			$this->carregarTemplate('pedido', $this->carrinho_dados, "Pastelaria - Pedido");
		}

		// calculando o valor total das bebidas
		if(isset($_SESSION['carrinho_bebidas']) && count($_SESSION['carrinho_bebidas']) > 0)
		{
			if(isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel']) > 0 )
			{
				foreach($_SESSION['carrinho_bebidas'] as $chave => $quantidade)
				{
					foreach($this->carrinho_dados['bebidas'] as $field => $value)
					{
						if($chave == $value->id_bebida)
						{
							$total_bebida += $value->valor_unidade * $quantidade;
						}
					}
				}
			} else
			{
				$total_bebida = 0;
				$total_pastel = $total_bebida;
			}
			if(!count($_SESSION['carrinho_bebidas']))
			{
				$total_bebida = 0;
			}
		}
		// calcular o valor total do pedido
		$saldo_final = $total_pastel + $total_bebida;

		if($total_pastel || $total_bebida)
		{
			return $saldo_final;
		} else {
			return 0;
		}
	}

	// validando dados do pedido do usuario
	public function dadosCliente()
	{
		try
		{
			if(isset($_POST['forma_entrega']) && !empty($_POST['forma_entrega']) )
			{// forma de entrega
				$this->forma_entrega = $_POST['forma_entrega'];
			}
			if(isset($_POST['sel_forma_pagamento']) && !empty($_POST['sel_forma_pagamento']) )
			{// forma_pagamento
				$this->forma_pagamento = htmlspecialchars($_POST['sel_forma_pagamento']);
			}

			$saldo_final = $this->calculador_caixa();
			if($saldo_final)
			{
				// aqui entra a descisao se o cliente esta logado
				if(isset($_SESSION['cliente']) && !empty($_SESSION['cliente']))
				{

					if(isset($_SESSION['cliente']['id'])){

						// captura o id do cliente que esta logado
						$idcliente = intval($_SESSION['cliente']['id']);

						// insere o pedido do cliente no banco
						$retorn_id_pedido = $this->conexaoCar->insere_pedido($saldo_final, $this->forma_entrega, $idcliente);

						// insere a forma de pagamento
						$this->conexaoCar->insere_forma_pagamento($this->forma_pagamento, $saldo_final, $retorn_id_pedido);

						// insere o pastel e bebidas escolhido(a)s
						$this->insere_pastel($retorn_id_pedido);

						// limpa os items dos carrinho
						$this->limpar_carrinhos();

						// redireciona o cliente para pagina pedido
						$this->carrinho_dados['messagem_pedido_invalido'] = "pedido enviado com sucesso!";
						$this->index();
					}
				} else
				{
					// obtendo informações do formulario do pedido
					if(isset($_POST['cNome']))
					{
						if(isset($_POST['cNome']) && !empty($_POST['cNome']) ) // Nome
							$this->nome = htmlspecialchars($_POST['cNome']);

						if(isset($_POST['cCelular']) && !empty($_POST['cCelular']) ) // Celular
							$this->celular = htmlspecialchars($_POST['cCelular']);

						if(isset($_POST['cBairro']) && !empty($_POST['cBairro'])) // Bairro
							$this->bairro = htmlspecialchars($_POST['cBairro']);

						if(isset($_POST['cNumero']) && !empty($_POST['cNumero'])) // Numero
							$this->numero = htmlspecialchars($_POST['cNumero']);

						if(isset($_POST['cComp']) && !empty($_POST['cComp'])) // complemento
							$this->complemento = htmlspecialchars($_POST['cComp']);


						 // retorna o id da tabela cliente
						$id_cli = $this->conexaoCar->insere_clientes($this->nome, $this->celular);

						if(!empty($this->complemento) && !empty($this->numero) && !empty($this->bairro))
						{
							// insere endereco do cliente
							$this->conexaoCar->insere_endereco_cli($this->complemento, $this->numero, $this->bairro, $id_cli);

						}

						// insere o pedido do cliente no banco
						$retorn_id_pedido = $this->conexaoCar->insere_pedido($saldo_final, $this->forma_entrega, $id_cli);

						// inserindo forma de pagamento
						$this->conexaoCar->insere_forma_pagamento($this->forma_pagamento, $saldo_final, $retorn_id_pedido);

						// inserindo na tabela pedido_pastel
						$this->insere_pastel($retorn_id_pedido);
						$this->limpar_carrinhos();
						$this->carrinho_dados['messagem_pedido_invalido'] = "pedido enviado com sucesso!";
						$this->index();
					}
			}
		}
		} catch(Exception $erro)
		{
			echo $erro->getMessage();
		}
	}


	// guarda as informações do pedido dos cliente
	public function insere_pastel($idpedido)
	{
		if(isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel']) > 0
		&& isset($this->carrinho_dados['cardapio_pastel']) && count($this->carrinho_dados['cardapio_pastel']) > 0)
		{
			foreach($_SESSION['carrinho_pastel'] as $chave => $quantidade):
				foreach($this->carrinho_dados['cardapio_pastel'] as $field => $value):
					if($chave == $value->id_cardapio):
						$retorno_id_pastel = $this->conexaoCar->insere_pastel($value->nome, $value->valor_unidade, $quantidade, $chave);
						$this->conexaoCar->insere_pedido_pastel($retorno_id_pastel, $idpedido);
					endif;
				endforeach;
			endforeach;
		}

		// insere registro na tabela pedido_bebidas
		if(isset($_SESSION['carrinho_bebidas']) && count($_SESSION['carrinho_bebidas']) > 0
		&& isset($this->carrinho_dados['bebidas']) && count($this->carrinho_dados['bebidas']) > 0)
		{
			foreach($_SESSION['carrinho_bebidas'] as $chave => $valor_qtd):
				foreach($this->carrinho_dados['bebidas'] as $field => $value):
					if($chave == $value->id_bebida):
						$this->conexaoCar->insere_pedido_bebidas($valor_qtd, $value->id_bebida, $idpedido);
					endif;
				endforeach;
			endforeach;
		}
	}


	// limpa items dos carrinho
	public function limpar_carrinhos()
	{
		if(isset($_SESSION['carrinho_pastel']) && count($_SESSION['carrinho_pastel']) > 0)
			unset($_SESSION['carrinho_pastel']);
		if(isset($_SESSION['carrinho_bebidas']) && count($_SESSION['carrinho_bebidas']) > 0)
			unset($_SESSION['carrinho_bebidas']);
	}
}
?>
