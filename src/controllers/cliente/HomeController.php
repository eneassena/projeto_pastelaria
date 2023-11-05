<?php

namespace Src\controllers\cliente;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public $title = "Home";
    private $filePathPage = 'clients/home';

    public function __construct()
    {
        parent::__construct();
    }

    public function render(Request $request, Response $response, $args): Response
    {
        $pageContent = $this->GetPage();

        $response->getBody()->write($pageContent);

        return $response;
    }

    protected function GetPage(): string
    {

        $this->setData('title', $this->title);

        return $this->template->render($this->filePathPage, $this->getData());
    }
}
