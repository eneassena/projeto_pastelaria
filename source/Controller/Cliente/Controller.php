<?php


namespace Source\Controller\Cliente;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
  /** @var Engine[$template] */
  private $template = null;

  /** @var array[$data] */
  private $data = null;
  
  /** @var Router[$router] */
  private $router = null;


  /**
   * @return Engine
   */
  public function getTemplate() {
    return $this->template;
  }
  /**
   * @return array
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @param string[$key]
   * @param [$value]
   * @return void
   */
  public function setData(string $key, $value):void {
    $this->data[$key] = $value;
  }
  
  /**
   * @return Router
   */
  public function getRouter(): Router {
    return $this->router;
  }

  /**
   * @param Router[$router]
   * @return void
   */
  public function setRouter(Router $router): void {
    $this->router = $router;
  }

  public function __construct()
  {
    $this->start();
  }

  /**
   * @return void
   */
  public function start(): void
  {
    $this->template = new Engine(PATH_TEMPLATE, 'php');
    $this->data = [];
    $this->router = new Router(ROOT);
  }
 
}
