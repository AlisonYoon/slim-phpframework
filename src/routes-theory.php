<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', function (Request $request, Response $response, array $args) use ($container) {
        //$request is the php representation of HTTP request. SLIM instantiates this $request object for you.
        //$response is the php representation of HTTP response. SLIM instantiates this $response object for you. You can add data in it to send it back to the client.
        //third param $args : it's an associative array. $key is the name of your placeholders (such as {id}). $value is the value from the url. (you can see it by var_dump($args))

        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");  //'logger' is the dependency here if this was a class

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);  // 'renderer' is the dependency here if this was a class
        //load that file to View (instead of doing $response->write("string"))
        //it uses <templates>

//        return $container->get('renderer')->render($response, 'newIndex.phtml', $args);
    });
    $app->get('/users', function (Request $request, Response $response) { //when user uses GET request
        $response->write('user data');
    });

//    $app->post('/users', function(Request $request, Response $response){ //when user uses POST request. second param function can be either anonymous or named
//        $response->write('user POST data');
//    });


//    $app->post('/users', (new foo)->method());
    //instead of instantiating like below
    //$foo = new foo();
    //$app->post('/users', $foo->method());

//    $app->post('/users2', (new foo)->method());  //now this is bad because you're instantiating same object twice for different urls

//    $app->get('/users2', new \Example\Foo());  //use name space and __invoke magic method. invokable object. (use object as if it's a method)
    //by using invokable object, you have access to all the methods & properties.


//    $app->get('/users2', \Example\Foo::doThing());  //call static method (not used very often)
    //static method doesn't have access to object's properties. (can't use $this), it cannot call API or connect to DB

//    $app->get('/users/{id}', new \Example\Foo());   //Pattern matching. {id} is like a placeholder.
//    $app->get('/users/{id:[0-9]+}', new \Example\Foo());    //You could use Regex for pattern matching. This one takes only numbers. (It doesn't "fully" support Regex. Just for numbers or letters pretty much)
//    $app->get('/users/{id}/{category}', new \Example\Foo());  //you can add more pattern to it
//    $app->get('/users/{id}[/{category}]', new \Example\Foo());  //you can make {category} optional by putting it in the square brackets. it will work with/without {category}


    //these get methods are Controller (it tells it to go where depends on which url)

    $app->get('/use/{id:[0-9]+}', function(Request $request, Response $response, array $args) use ($container) {
        return $container->get('renderer')->render($response, 'newIndex.phtml', $args);
    });

    $app->get('/users/{id}', 'Foo');  // Here 'Foo' is controller
};
