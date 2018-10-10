<?php
declare(strict_types = 1);

namespace Controllers;

use Psr\Http\Message\ServerRequestInterface;

use Chiron\Http\Psr\Response;

// TODO : passer dans le constructeur un objet PSR17 ResponseFactory
class HelloController
{
    public function index(ServerRequestInterface $request)
    {
        $response = new Response();
        return $response->write('Hello world !');
    }
}
