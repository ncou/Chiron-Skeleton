<?php
//declare(strict_types = 1);

//namespace Middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class MiddlewareOne implements MiddlewareInterface
{

/*
    public function __construct()
    {
    }
    */

    /**
     * Process a request and return a response.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        return $response->write('MiddlewareOne');
        //return new Response('TOTO1', 400);
    }
}