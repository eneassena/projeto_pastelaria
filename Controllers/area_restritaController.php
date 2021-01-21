<?php
/**
 *
 */
class area_restritaController extends Controller
{
	public $dados_area_restrita;
	public $taxa_entrega_pedido = null;

	public function __construct()
	{
		try {
			$this->dados_area_restrita = array();
			$this->admin = new Restrita();
			$this->dados_area_restrita['pastel_restrito'] = $this->admin->consultaCardapio();
			$this->dados_area_restrita['bebidas_restrita'] = $this->admin->consultaBebidas();
			$this->dados_area_restrita['pedido_restrita'] = $this->admin->consulta_pedido_edit();
		} catch (Exception $e) {
			$this->dados_area_restrita['erro'] = $e->getMessage();
		} finally {
			Restrita::$conn = null;
		}

	}

	public function index()
	{
		try {
			if(isset($_SESSION['cliente'])){// se alguma sessão cliente tentar acessar sera deslogada
				header('location: ?pag=cadastro/logout');
			}

			if(isset($_SESSION['admin']))
			{// update dados
				$this->admin = new Restrita();
				$this->dados_area_restrita['pastel_restrito'] = $this->admin->consultaCardapio();
				$this->dados_area_restrita['bebidas_restrita'] = $this->admin->consultaBebidas();
				$this->dados_area_restrita['pedido_restrita'] = $this->admin->consulta_pedido_edit();
				$this->carregarTemplate('area_restrita_admin/area_restrita', $this->dados_area_restrita, "Área Restrita");
			} else
			{
				$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
			}

		} catch (Exception $e)
		{
			$this->dados_area_restrita['erro'] = $e->getMessage();
			$this->carregarTemplate('pagina-erro', $this->dados_area_restrita, "Área Restrita - Error");
		} finally {
			Restrita::$conn = null;
		}
	}



	public function editar_pedido($idpedido){

		if(isset($_SESSION['admin']))
		{ // verifica se tem pedido na tabela pedido e envia para view de edição
			if(isset($this->dados_area_restrita['pedido_restrita'])){
				foreach($this->dados_area_restrita['pedido_restrita'] as $value){

					if($value->id_pedido == $idpedido){

						// dados do pastel que o cliente pediu
						$this->dados_area_restrita['dados_pastel'] = $this->admin->consulta_pastel_pedido($idpedido);

						// dados da bebidas que o cliente pediu
						$this->dados_area_restrita['dados_bebida'] = $this->admin->consulta_bebidas_pedido($idpedido);

						// dados do cliente que realizou um pedido
						$this->dados_area_restrita['dados_cliente'] = $this->admin->consulta_cliente_pedido($idpedido);

						// dados do pedido que o cliente fez que sera editado
						$this->dados_area_restrita['dados_pedido'] = $this->admin->consulta_pedido_done($idpedido);
						if($this->dados_area_restrita['dados_pastel'] && $this->dados_area_restrita['dados_cliente'] &&
						$this->dados_area_restrita['dados_pedido'] || $this->dados_area_restrita['dados_bebida']) {
							// redirect para formulário
							$this->carregarTemplate('area_restrita_admin/formulario_pedido', $this->dados_area_restrita, 'Área Restrita - Editar Pedido');

						}  else {
							$this->admin->deleta_pedido($idpedido);
							$this->dados_area_restrita['messagem_area_restrita'] = "este pedido não existe ou ja foi deletado";
							$this->carregarTemplate('area_restrita_admin/area_restrita', $this->dados_area_restrita, 'Área Restrita');
						}
					}
				}

			} else {

				$this->dados_area_restrita['messagem_area_restrita'] = "este pedido não existe ou ja foi deletado";
				$this->carregarTemplate('area_restrita_admin/area_restrita', $this->dados_area_restrita, 'Área Restrita');
			}

		} else
		{
			$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
		}
	}

	public function update_pedido($idpedido=0, $f=null){

		try {

			if(isset($_SESSION['admin']))
			{
				if(isset($_POST['btn_pedido']))
				{
					if(isset($_POST['cTaxa_Entrega']) && !empty($_POST['cTaxa_Entrega']) &&
					isset($_POST['cSituacao']) && !empty($_POST['cSituacao']))
					{
						$idpedido = $idpedido;
						$taxa_entrega = htmlspecialchars($_POST['cTaxa_Entrega']);
						$situacao = htmlspecialchars($_POST['cSituacao']) ;

						// verifica se os dados possui valor para atualizar a tabela pedido
						if($taxa_entrega && $situacao && $idpedido)	{
							$this->dados_area_restrita['messagem_area_restrita'] = "pedido editado com sucesso.";
							$this->admin->edicao_pedido_final($idpedido, $situacao, $taxa_entrega);
							 $this->index();
							//header("location: ?pag=area_restrita/index");

						} else {
							$this->index();
						}
					}
				} else {// se o valor do formulario de edição de pedido nao for alterado emite messagem
					$this->dados_area_restrita['messagem_area_restrita']="Não houver alteração no pedido do cliente";
					$this->index();
				}
			} else
			{
				$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
			}
		} catch(Exception $erro) {
			$this->dados_area_restrita['messagem_area_restrita'] = $erro->getMessage();
			$this->index();
		}

   }


	// faz login do administrador
	public function acesso_admin() {

		if(isset($_SESSION['admin'])){
			$this->index();
		} else{
			if(isset($_POST['adLogin']) && !empty($_POST['adLogin']) && isset($_POST['adPass']) && !empty($_POST['adPass']) )
			{
				try
				{
					$login_html = htmlspecialchars($_POST['adLogin']);
					$senha_html = md5(htmlspecialchars($_POST['adPass']));
					$result = array();
					$result = $this->admin->acesso_admin($login_html, $senha_html);
					if(count($result) > 0)
					{ // as informações do admin foi encontrada
						$_SESSION['admin'] = $result;
						$this->index();
					} else
					{ // o admin inseriu dados incorreto
						$this->dados_area_restrita['messagem_erro_login'] = "dados incorreto!";
						$this->index();
					}

				} catch(Exception $erro)
				{
					$this->dados_area_restrita['messagem_erro_login'] = $erro->getMessage();
				}

			} else {
				$this->carregarTemplate('area_restrita_admin/login_admin', $this->dados_area_restrita, "Painel de Controle");
			}
		}
	}

	// método de adição de pastéis
	public function add_pastel()
	{

		try{

			if(isset($_SESSION['admin']))
			{// update dados
				if(isset($_POST['pSabor']) && !empty($_POST['pSabor'])){
					$nome = htmlspecialchars($_POST['pSabor']);
				}
				if(isset($_POST['iIngred']) && !empty($_POST['iIngred'])){
					$ingred = htmlspecialchars($_POST['iIngred']);
				}
				if(isset($_POST['sValor']) && !empty($_POST['sValor'])){
					$preco = htmlspecialchars($_POST['sValor']);
				}
				if($nome && $ingred && $preco){
					$this->dados_area_restrita['messagem_area_restrita'] = "Pastel ". $nome. " editado!";
					$this->admin->cadastrar_pastel($nome, $ingred, $preco);
				}
				$this->carregarTemplate('area_restrita_admin/area_restrita', $this->dados_area_restrita, "Área Restrita");
			} else
			{
				$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
			}
		} catch(Exception $erro) {
			echo $erro->getMessage();
		}

	}

	// adiconar bebida novas
	public function add_bebidas()
	{
		try{
			if(isset($_SESSION['admin']))
			{// update dados
				if(isset($_POST['tBebida'])){
					if(isset($_POST['tBebida']) && !empty($_POST['tBebida'])) {
						$tipo_bebida = htmlspecialchars($_POST['tBebida']);
					}
					if(isset($_POST['cxSabor']) && !empty($_POST['cxSabor'])) {
						$sabor = htmlspecialchars($_POST['cxSabor']);
					}
					if(isset($_POST['inFruta']) && !empty($_POST['inFruta'])) {
						$fruta = htmlspecialchars($_POST['inFruta']);
					}
					if(isset($_POST['inQtd']) && !empty($_POST['inQtd'])) {
						$qtd_ml = htmlspecialchars($_POST['inQtd']);
					}
					if(isset($_POST['inValorUnidade']) && !empty($_POST['inValorUnidade'])) {
						$valor_unid = htmlspecialchars($_POST['inValorUnidade']);
					}
					if($tipo_bebida && $sabor && $fruta && $qtd_ml && $valor_unid)
					{
						$this->admin->cadastrar_bebidas($tipo_bebida, $sabor, $fruta, $qtd_ml, $valor_unid);
					}
					header("location: ?pag=area_restrita/index");
				}
			} else
			{
				$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
			}
		} catch(Exception $erro) {
			$this->dados_area_restrita['messagem_area_restrita'] = $erro->getMessage();
		}
	}

	// manipulando os dados dos pastéis e bebidas
	public function editar_pastel($idpastel){
		try {

			if($idpastel){
				$this->dados_area_restrita['dados_edicao_pastel'] = $this->admin->consulta_pastel_por_id($idpastel);
				$this->carregarTemplate('area_restrita_admin/add_pastel', $this->dados_area_restrita, "Área Restrita - Editar Pastel");
			}
		} catch(Exception $erro) {
			$this->dados_area_restrita['messagem_area_restrita'] = $erro->getMessage();
		}


	}

	public function excluir_pastel($idpastel=null){
		if((int)$idpastel){
			$this->dados_area_restrita['messagem_area_restrita'] = $this->admin->detela_cardapio_pastel($idpastel);
			$this->index();
		}
	}

	public function finalizar_edicao_pastel($idcardapio){

		if(isset($_POST['btn_pedido'])){
			if(isset($_POST['pSabor']) && !empty($_POST['pSabor'])) {
				$sabor = htmlspecialchars($_POST['pSabor']);
			}
			if(isset($_POST['iIngred']) && !empty($_POST['iIngred'])) {
				$ingrediente = htmlspecialchars($_POST['iIngred']);
			}
			if(isset($_POST['sValor']) && !empty($_POST['sValor'])) {
				$valor = htmlspecialchars($_POST['sValor']);
			}
			if($sabor && $ingrediente && $valor){
				$this->dados_area_restrita['messagem_area_restrita'] = $this->admin->cad_cardapio_pastel($idcardapio, $sabor, $ingrediente, $valor);
				$this->carregarTemplate('area_restrita_admin/area_restrita', $this->dados_area_restrita, "Área Restrita");
			}
			$this->index();

		} else {
			$this->index();
		}

	}

	public function editar_bebida($idbebida){

		$this->dados_area_restrita['dados_edicao_bebida'] = $this->admin->consulta_bebida_por_id($idbebida);
		$this->carregarTemplate('area_restrita_admin/add_bebidas', $this->dados_area_restrita, "Área Restrita - Editar Bebida");

	}

	public function excluir_bebida($idbebida=null){
		if(isset($_SESSION['admin']))
		{// update dados

			if((int)$idbebida){
				$this->dados_area_restrita['messagem_area_restrita'] = $this->admin->detela_bebida($idbebida);
				$this->index();
			}

		} else
		{
			$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
		}
	}

	public function finalizar_edicao_bebidas($idbebida){
		if(isset($_SESSION['admin']))
		{// update dados

			if(isset($_POST['tBebida'])){
				$tipo = null; $sabor = null; $fruto = null; $quantidade_ml = null; $valor_unidade = null;

				if(isset($_POST['tBebida']) && !empty($_POST['tBebida'])) {
					$tipo = htmlspecialchars($_POST['tBebida']);
				}
				if(isset($_POST['cxSabor']) && !empty($_POST['cxSabor'])) {
					$sabor = htmlspecialchars($_POST['cxSabor']);
				}
				if(isset($_POST['inFruta']) && !empty($_POST['inFruta'])) {
					$fruto = htmlspecialchars($_POST['inFruta']);
				}
				if(isset($_POST['inQtd']) && !empty($_POST['inQtd'])) {
					$quantidade_ml = htmlspecialchars($_POST['inQtd']);
				}
				if(isset($_POST['inValorUnidade']) && !empty($_POST['inValorUnidade'])) {
					$valor_unidade = htmlspecialchars($_POST['inValorUnidade']);
				}
				$this->dados_area_restrita['messagem_area_restrita'] = $this->admin->cad_bebida($idbebida, $tipo, $sabor, $fruto, $quantidade_ml, $valor_unidade);
				header("location: ?pag=area_restrita/index");

			} else {
				$this->index();
			}

		} else
		{
			$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
		}
	}

	// metodo deleta um pedido de retirada
	public function delete_pedido_retirada($id){
		if(isset($_SESSION['admin']))
		{// update dados

	 		$this->admin->deleta_pedido($id);
			$this->index();

		} else
		{
			$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
		}

	}

	public function delete_todos_pedido($idpedido){
		try {
			if(isset($_SESSION['admin']))
			{// update dados

				$this->admin->deleteAll_pedidos($idpedido);
				$this->index();

			} else
			{
				$this->carregarTemplate('home', $this->dados_area_restrita, "Pastelaria - Home");
			}
		} catch (Exception $e) {
			$this->index();
		}

	}
}
?>
