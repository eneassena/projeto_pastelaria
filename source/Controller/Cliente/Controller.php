<?php


namespace Source\Controller\Cliente;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
  /** @var Engine[$template] */
  protected $template = null;

  /** @var array[$data] */
  protected $data = null;
  
  /** @var Router[$router] */
  protected $router = null;


  /**
   * @return Engine
   */
  protected function getTemplate() {
    return $this->template;
  }
  /**
   * @return array
   */
  protected function getData() {
    return $this->data;
  }

  /**
   * @param string[$key]
   * @param [$value]
   * @return void
   */
  protected function setData(string $key, $value):void {
    $this->data[$key] = $value;
  }
  
  /**
   * @return Router
   */
  protected function getRouter(): Router {
    return $this->router;
  }

  /**
   * @param Router[$router]
   * @return void
   */
  protected function setRouter(Router $router): void {
    $this->router = $router;
  }

  protected function __construct()
  {
    $this->start();
  }

  /**
   * @return void
   */
  private function start(): void
  {
    $this->template = new Engine(PATH_TEMPLATE, 'php');
    $this->data = [];
    $this->setRouter(new Router(ROOT));
  }
 
}
