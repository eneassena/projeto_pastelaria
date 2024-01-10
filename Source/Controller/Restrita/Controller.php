<?php


namespace Source\Controller\Restrita;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller
{
  /** @var Engine[$views] */
  protected $views = null;
  /** @var array[$data] */
  protected $data = null;
  /** @var Router[$router] */
  protected $router = null;

  /** 
   * @return void
   */
  public function getViews()
  {
    $this->views;
  }

  /**
   * @param string[$key]
   * @param [$value]
   * @return void
   */
  public function setData(string $key, $value): void
  {
    $this->data[$key] = $value;
  }

  /**
   * @param string[$key]
   * @param [$value]
   * @return array|null
   */
  public function getData(string $key): array|null
  {
    return $this->data[$key];
  }

  /**
   * @return Router|null
   */
  public function getRouter(): Router|null
  {
    return $this->router;
  }

  /**
   * @param Router[$router]
   * @return void
   */
  public function setRouter(Router $router): void
  {
    $this->router = $router;
  }

  /**
   * @return void
   */
  public function __construct()
  {
    $this->init();
  }

  /**
   * @return void
   */
  private function init(): void
  {
    $this->views = new Engine(PATH_TEMPLATE, 'php');
    $this->data = [];
    $this->router = new Router(ROOT);
  }
}
