<?php

namespace App\Middleware;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthMiddleware
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke( Request $request, Response $response, callable $next) {

        if(!$login)
            return $response->withRedirect($this->container->get('router')->pathFor('login'));


        return $next($request, $response);


    }
}