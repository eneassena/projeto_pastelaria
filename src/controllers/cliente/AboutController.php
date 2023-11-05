<?php


namespace Src\controllers\cliente;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AboutController extends Controller {
  protected $title = "About";

  public function __construct() {
    parent::__construct();
  }

  /**
   * @return void
   */
  public function render(Request $request, Response $response): Response {
    
    $pageContent = $this->GetPage();

    $response->getBody()->write($pageContent);

    return $response;
  }

  public function getPage(): string {
    $this->setData('title', SITE . " | About");

    return $this->getTemplate()->render("sobre", $this->getData());
    
  }

  /**
   * @param array[$data]
   * @return void
   */
  public function error(array $data): void {
    $this->setData('title', SITE . " | About - Error"); 
    var_dump($data);
  }
}
