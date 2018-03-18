<?php
declare(strict_types = 1);

//namespace Middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/*
interface MiddlewareInterface
{
    //public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface;
    public function process($request, $handler);
}
*/

class MiddlewareThree implements MiddlewareInterface
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
        return $response->write('MiddlewareTHREE');

        //return new Response('TOTO2', 400);
    }
}
