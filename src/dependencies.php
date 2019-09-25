<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) { //this is a function Factory
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']); //It's instantiating an object and pass something in it
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));    //Lots of passing-in happening here.
        return $logger;
    };

    $container['db'] = function($container){
        $dbConfig = $container->get('settings')['db']; //get('settings') gives you everything in the settings.php file in an array format
        $db = new PDO('mysql:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['dbname'] . $dbConfig['username'] . $dbConfig['password']);
        return $db;
    };

    $container['HomepageController'] = new \Example\Factories\HomepageControllerFactory();  //adding a Controller Factory

    $container['StudentModel'] = new \Example\Factories\StudentModelFactory();  //adding a Model Factory

};
