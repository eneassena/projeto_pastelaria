<?php

class Core {

	public function __construct()
	{
		$this->run();
	}

	public function run(){

		$controller = "homeController";
		$metodo = "index";
 		$paramentros = array();

		if(isset($_GET['pag']))
		{
			$url = $_GET['pag'];

		}

		// possui informação apos dominio www.sitex.com/classe/funcao/paramentros
		if(!empty($url))
		{
			$url = explode('/', $url);
			$controller = $url[0].'Controller'; //noticiaController
			array_shift($url);

			// if o usuario mandou a função
			if(isset($url[0]) && !empty($url[0]))
			{
				$metodo = $url[0];
				array_shift($url);
			} else  // usuario enviou somente a classe sem metodo
			{
				$metodo = 'index';
			}

			if(count($url) > 0) // se tiver paramentos na url sera pego aqui
			{
				if(isset($url[0]) && !empty($url[0])){
					$paramentros = $url;
				}
			} else {
				$paramentros = array();
			}
		} else // www.sitex.com/
		{
			$controller = 'homeController';
			$metodo = 'index';
		}

		$caminho = 'laraveltips/projeto_pastelaria/Controllers/'.$controller.'.php';

		if(!file_exists($caminho) && !method_exists($controller, $metodo))
		{
			$controller = 'homeController';
			$metodo = 'index';
		}

		call_user_func_array(array(new $controller, $metodo), $paramentros);

	}



}
