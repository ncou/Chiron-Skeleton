<?php
declare(strict_types = 1);

use Psr\Http\Message\ServerRequestInterface;

// *************
// *** Home  ***
// *************
require APP_DIR.'/controllers/HelloController.php';
require APP_DIR.'/middlewares/MiddlewareOne.php';

$app->get('/', function (ServerRequestInterface $request) {
    $controller = new HelloController($this);
    return $controller->index($request);
})->name('home');
