<?php

namespace Source\Controller\Cliente;

use CoffeeCode\Router\Router;
use Source\Models\site\User;
use CoffeeCode\DataLayer\Connect;

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
        if(isset($data['message'])){
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
		$this->data['title'] = SITE . " | Error";
		$this->data['error'] = $data['errcode'];
		echo $this->getTemplate()->render('site/erro', $this->data);
	}

}
