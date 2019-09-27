<?php


namespace Example\Middleware;


class LoggingMiddleware
{
    public static function log($request, $response, $next) {

        $data = $request->getParsedBody();
        if($data['something'] == '62') {
            return $response->withStatus(500);
        }
        //Above lines(use it instead of < $response->getBody()->write('before'); >) are using Middleware to filter.
        //If something equals 62, it won't get to the controller.

//        $response->getBody()->write('before ');

        $response = $next($request, $response);

        $response->getBody()->write('after ');

        return $response;
    }
}