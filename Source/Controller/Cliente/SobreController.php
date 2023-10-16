<?php


namespace Source\Controller\Cliente;

class SobreController extends Controller
{


  public function __construct()
  {
    parent::__construct();
  }

  /**
   * @return void
   */
  public function home(): void
  {
    $this->setData('title', SITE . " | Sobre"); 

    echo $this->getTemplate()->render("site/sobre", $this->getData());
  }

  /**
   * @param array[$data]
   * @return void
   */
  public function error(array $data): void {
    $this->setData('title', SITE . " | Sobre - Error"); 
    var_dump($data);
  }
}
