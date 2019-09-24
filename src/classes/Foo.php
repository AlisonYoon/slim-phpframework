<?php

namespace Example;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\PhpRenderer;

class Foo
{

    public $renderer;

    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public static function doThing() {
        echo 'foo is running';
    }

    public function __invoke(Request $request, Response $response, array $args){  //__invoke magic method makes the object can be called like a function
//        echo 'foo is running';
//        echo "<br>";
//        var_dump($args);
//        echo "<br>";
//        $response->write('hello');
        $this->renderer->render($response, 'index.phtml');
    }
}