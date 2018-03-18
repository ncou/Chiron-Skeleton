<?php

use Psr\Http\Message\ServerRequestInterface;

class HelloController
{
    public function index(ServerRequestInterface $request)
    {
        $response = new Chiron\Http\Response();
        return $response->write('Hello world !');
    }
}
