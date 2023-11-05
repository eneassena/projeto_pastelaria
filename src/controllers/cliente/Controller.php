<?php 


namespace Src\controllers\cliente;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class Controller {
    
    /** @var Engine[$template] */
  protected $template = null;

  /** @var array[$data] */
  protected $data = null;
  
 


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
  
  protected function __construct()
  {
    $this->start();
  }

  /**
   * @return void
   */
  private function start(): void
  {
    $this->template = new Engine(dirname(__DIR__, 2).'/views');
   
    $this->data = [];
  }
}