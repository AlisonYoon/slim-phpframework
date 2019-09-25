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
        //do things such as validation, authentication and getting data from the model

        $viewData = ['students'=> ['Matt', 'Tom', 'Liz']];

//        $this->renderer->render($response, 'index.phtml', ['name'=>'mike']); //third argument is an optional param which takes an associative array. This case, it creates variable $name with 'mike' as a value

//        $this->renderer->render($response, 'index.phtml', $viewData);

//        return $response->withJson($viewData); //return result in JSON format. Also, it removes the dependency on PhpRenderer.

//        return $response->withRedirect('/login.php'); // if the user needs to log in, send her to here.

        return $response->withStatus(403); //403 means you don't have permission.
    }
}