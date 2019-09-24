<?php

namespace Example;

use Slim\Http\Request;
use Slim\Http\Response;

class Foo
{
    public static function doThing() {
        echo 'foo is running';
    }

    public function __invoke(Request $request, Response $response, array $args){  //__invoke magic method makes the object can be called like a function
//        echo 'foo is running';
//        echo "<br>";
//        var_dump($args);
//        echo "<br>";
        $response->write('hello');
    }
}