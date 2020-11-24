
<script type="text/javascript">
	
	function alert_cust(type, title, messagem){
		Swal.fire({
		  icon: type,
		  title: title,
		  text: messagem,
		  showConfirmButton: false,
		  timer: 2000
		});
	}
	alert_cust('success', false, 'pedido enviado com sucesso com javaScript');
	
</script>
<?php 


function alerta($type, $title, $msg){
	echo "ok";
	echo "<script type='text/javascript'>
	Swal.fire({
	  icon: '$type',
	  title: '$title',
	  text: '$msg',
	  showConfirmButton: false,
	  timer: 2000
	});
	</script>";
}

// alerta('success', false, 'pedido enviado com sucesso com php');
?>




<?php 






// if(isset($_SESSION['cliente']))
// {	
// 	// verificar o estatus do pedido
// 	// se estiver em andamento
// 	//confirmar pedido
// 	//recusar pedido

// } elseif(isset($_SESSION['cliente_comun']))
// {
// 	// verificar o estatus do pedido
// 	// se estiver em andamento
// 	//confirmar pedido
// 	//recusar pedido	
// 	unset($_SESSION['cliente_comun']);
// }  







// session_start();


//$_SESSION['cliente'] = array('id' => 1, 'messagem' => 'sessão cliente');
//$_SESSION['admin'] = array('id' => 1, 'messagem' => 'sessão admin');
//$_SESSION['cliente_comun'] = array('id' => 1, 'messagem' => 'sessão cliente comun');
// var_dump($_SESSION);

// if(isset($_SESSION['cliente']))
// {	
// 	echo $_SESSION['cliente']['messagem'].'<p>';
// 	echo '<br/><a href="#">Confirmar</a><br/>';
// 	echo '<a href="#">Recusar</a>';
// 	unset($_SESSION['cliente']);

// } elseif(isset($_SESSION['cliente_comun']))
// {
// 	echo $_SESSION['cliente_comun']['messagem'].'<p>'; 
// 	echo '<br/><a href="#">Confirmar</a><br/>';
// 	echo '<a href="#">Recusar</a>';
// 	unset($_SESSION['cliente_comun']);
// }  


// if(isset($_SESSION['admin']))
// {
// 	if(isset($_SESSION['cliente']))
// 	{
// 		var_dump($_SESSION['cliente']);
// 		echo '<br/><a href="#">Confirmar</a><br/>';
// 		echo '<a href="#">Recusar</a>';
// 	} elseif(isset($_SESSION['cliente_comun'])) 
// 	{
// 		var_dump($_SESSION['cliente_comun']);
// 		echo '<br/><a href="#">Confirmar</a><br/>';
// 		echo '<a href="#">Recusar</a>';
// 	}
	
// } else {
// 	echo "sessao admin existe nao é possivel mostra links";
// }




 ?>