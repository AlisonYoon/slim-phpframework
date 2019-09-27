<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

//middleware is between first request entry point and route.php
//executes before route.php
//the last thing response sees.

# application middleware : it applies for entire application (every request, every response)

# route middleware : middleware for specific route.

// usage examples : logging users ip address or popular time when ppl access the app.

// used for authentication(route middleware). there are pages users need to login.
// If user is already logged in, don't need to run same function in different pages.

//used for permission(route middleware). (is this user admin or not?)
// you can have two layers of middleware: one deals with authentication and the other one deals with permission for example.


return function (App $app) {
    $app->add(function(Request $request, Response $response, $next) { //add middleware. add() takes callable. it can take invokable object, function, static method..
                                                                        //the third argument $next contains what's gonna come next(think linked list)
                                                                        // here $app->add() is an application level middleware.
        // do something before the controller
        $response->getBody()->write('before controller ');

        $response = $next($request, $response); //do the controller  # if you add < $response->write('controller') > in the controller, then you will see it prints out in order in the page.

        //do something after the controller
        $response->getBody()->write('after controller ');


        return $response;
    });

};
