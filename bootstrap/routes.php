<?php
declare(strict_types = 1);

use Psr\Http\Message\ServerRequestInterface;

// *************
// *** Home  ***
// *************

$app->get('/', function (ServerRequestInterface $request) {
    $controller = new Controllers\HelloController();
    return $controller->index($request);
})->name('home');
