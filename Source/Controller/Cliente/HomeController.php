<?php

namespace Source\Controller\Cliente;

use CoffeeCode\Router\Router;

class HomeController extends Controller
{
	public function __construct(Router $router)
	{
		parent::__construct();
		$this->setRouter($router);
	}

	/**
	 * @param array[$data] 
	 * @return void
	 */
	private function helper_home_message(array $data = []): void
	{
		if (isset($data['message'])) {
			$data = [
				'msg' => $data['message'],
				'cls' => 'info', 'status' => false
			];

			$this->setData('message', $data);
		}
	}

	/**
	 * @param array[$data]
	 * @return void
	 */
	public function home(array $data): void
	{
		$this->helper_home_message($data);

		$this->setData('title', SITE . " | Home");

		echo $this->getTemplate()->render('site/home', $this->getData());
	}

	/**
	 * @param array[$data]
	 * @return void
	 */
	public function error(array $data): void
	{
		$this->setData('title', SITE . " | Error");
		$this->setData('error', $data['errcode']);
		echo $this->getTemplate()->render('site/erro', $this->getData());
	}
}


class PDOConnect
{
	protected $conexao = null;
	public function __construct($server, $username, $password, $dbname)
	{
		$this->conexao = null;
	}
	function insert(array $dados): mixed
	{
		return "not implementation";
	}

	function select(bool $all = false, int $id = 0)
	{
		if ($all) {
			return "not implementation";
		}
		return "not implementation";
	}

	function update(int $id, array $dados)
	{
		return "not implementation";
	}

	function delete(int $id)
	{
		return "not implementation";
	}
}


class MySQLOperations extends PDOConnect
{
	public function __construct()
	{
		parent::__construct('$server', '$username', '$password', '$dbname');
	}
}
