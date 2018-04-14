<?php

use Psr\Log\NullLogger;
use Chiron\Logger;

//************************
// MIDDLEWARES

$app->middleware(new Chiron\Middleware\EmitterMiddleware());

//$logger = new NullLogger();
$logger = new Logger(ROOT_DIR.'/'.\Chiron\LOG_DIR_NAME.'/CHIRON.log');


$errorHandlerMiddleware = new Chiron\Middleware\ErrorHandlerMiddleware(true);

// default error handler for all the HttpException catched
$errorHandlerMiddleware->bindExceptionHandler(Chiron\Exceptions\HttpException::class, new Chiron\ErrorHandler\HttpExceptionHandler());
// custom error handler for the maintenance middleware (htt_code = 503)
$errorHandlerMiddleware->bindExceptionHandler(Chiron\Exceptions\ServiceUnavailableHttpException::class, new Chiron\ErrorHandler\MaintenanceHandler());

$app->middleware($errorHandlerMiddleware);


$app->middleware(new Chiron\Middleware\LogExceptionMiddleware($logger));

$app->middleware(new Chiron\Middleware\CheckMaintenanceMiddleware());

$app->middleware(new Chiron\Middleware\MethodOverrideMiddleware());


$app->middleware(new Middlewares\MiddlewareTwo())->middleware(new Middlewares\MiddlewareTwo());

//------------------ CONTAINER -------------
$container = $app->getContainer();

$container['MiddlewareThree'] = function ($c) {
    return new Middlewares\MiddlewareThree();
};


$app->middleware('MiddlewareThree');

$app->getNamedRoute('home')->middleware(new Middlewares\MiddlewareOne());

//------------------------------------------

$app->middleware(new Chiron\Middleware\RoutingMiddleware($app));

// only parse the body if the route is found (the routingmiddleware will throw exception if route is not found)
$app->middleware(new Chiron\Middleware\ParsedBodyMiddleware());

$app->middleware(new Chiron\Middleware\DispatcherMiddleware());
