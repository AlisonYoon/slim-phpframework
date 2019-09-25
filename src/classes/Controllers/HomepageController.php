<?php


namespace Example\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;


class HomepageController
{
    public $renderer;

    /**
     * HomepageController constructor.
     * @param $renderer
     */
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->renderer->render($response, 'index.phtml', ['name'=>'mike']); //third argument is an optional param which takes an associative array. This case, it creates variable $name with 'mike' as a value
    }


}