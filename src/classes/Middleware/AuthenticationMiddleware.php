<?php


namespace Example\Middleware;


class AuthenticationMiddleware
{
    public static function auth($request, $response, $next) {

        $data = $request->getParsedBody();
        if($data['password'] !== '1234') {
            return $response->withStatus(401);
        }
        //Above lines(use it instead of < $response->getBody()->write('before'); >) are using Middleware to filter.
        //If something equals 62, it won't get to the controller.

//        $response->getBody()->write('before ');

        $response = $next($request, $response);

        $response->getBody()->write('after ');

        return $response;
    }
}