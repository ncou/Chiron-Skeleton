<?php

use Psr\Log\NullLogger;
use Chiron\Logger;

use Chiron\Http\Middleware\RoutingMiddleware;
use Chiron\Http\Middleware\DispatcherMiddleware;
use Chiron\Http\Middleware\BodyParserMiddleware;
use Chiron\Http\Middleware\EmitterMiddleware;
use Chiron\Http\Middleware\CheckMaintenanceMiddleware;
use Chiron\Http\Middleware\MethodOverrideMiddleware;
use Chiron\Http\Middleware\CharsetByDefaultMiddleware;
use Chiron\Http\Middleware\ContentTypeByDefaultMiddleware;
use Chiron\Http\Middleware\ContentLengthMiddleware;
use Chiron\Http\Middleware\ErrorHandlerMiddleware;
use Chiron\Http\Middleware\OriginalRequestMiddleware;

//************************
// MIDDLEWARES

$app->middleware(OriginalRequestMiddleware::class);

//$app->middleware(EmitterMiddleware::class);

$app->middleware(CharsetByDefaultMiddleware::class); // this middleware should be before the ContentTypeByDefaultMiddleware and before the ErrorHandlerMiddleware to add the charset in the new error response generated


$app->middleware(ErrorHandlerMiddleware::class);

$app->middleware(CheckMaintenanceMiddleware::class);

$app->middleware(MethodOverrideMiddleware::class);

$app->middleware(RoutingMiddleware::class);

$app->middleware(ContentLengthMiddleware::class);

$app->middleware(ContentTypeByDefaultMiddleware::class); // this middleware should be before the BodyParserMiddleware

// only parse the body if the route is found (the routingmiddleware will throw exception if route is not found)
$app->middleware(BodyParserMiddleware::class);

$app->middleware(new Chiron\Http\Middleware\SecurityHeadersMiddleware($app->getConfig()->security));

$app->middleware(DispatcherMiddleware::class);
