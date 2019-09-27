<?php


use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app){
    $container = $app->getContainer();

//    $app->get('/', 'HomepageController')->add('\Example\Middleware\LoggingMiddleware::log');
    $app->get('/', 'HomepageController');

//    $app->get('/newIndex', 'CheckPwController')->add('\Example\Middleware\AuthenticationMiddleware::auth');
    $app->post('/checkPw', 'HomepageController')->add('\Example\Middleware\AuthenticationMiddleware::auth');;
};