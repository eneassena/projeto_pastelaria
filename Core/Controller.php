<?php 

class Controller {
	public $dados;

	public function __construct()
	{
		$this->dados = array();
	}

	public function carregarTemplate($nomeView, $dadosModel=array(), $title = "Pastelaria")
	{
		$this->dados = $dadosModel;
		require 'View/template/template.php';
	}
	public function carregaViewNoTemplate($nomeView, $dadosModel=array(), $title = "Pastelaria")
	{
		extract($dadosModel);
		require 'View/'.$nomeView.'.php'; // dinamico
	}
}