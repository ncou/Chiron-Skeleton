<?php

use Psr\Log\NullLogger;
use Chiron\Logger;

use Chiron\Exception\ServiceUnavailableHttpException;
use Chiron\Exception\NotFoundHttpException;

//************************
// MIDDLEWARES

$app->middleware(new Chiron\Middleware\EmitterMiddleware());

//$logger = new NullLogger();
$logger = new Logger(Chiron\ROOT_DIR.Chiron\DS.Chiron\LOG_DIR_NAME.Chiron\DS.'CHIRON.log');


$errorHandlerMiddleware = new Chiron\Middleware\ErrorHandlerMiddleware(true);

// default error handler for all the HttpException catched
$errorHandlerMiddleware->bindExceptionHandler(Throwable::class, new Chiron\Handler\Error\HttpExceptionHandler());
// custom error handler for the maintenance middleware (htt_code = 503)
$errorHandlerMiddleware->bindExceptionHandler(ServiceUnavailableHttpException::class, new Chiron\Handler\Error\MaintenanceHandler());
// custom message when a 404 page not found is throw
$errorHandlerMiddleware->bindExceptionHandler(NotFoundHttpException::class, new Chiron\Handler\Error\NotFoundHandler());

$app->middleware($errorHandlerMiddleware);

$app->middleware(new Chiron\Middleware\LogExceptionMiddleware($logger));

$app->middleware(new Chiron\Middleware\CheckMaintenanceMiddleware());

$app->middleware(new Chiron\Middleware\MethodOverrideMiddleware());

//*****************************************************
// *****  BONUS : concat the name in the response *****
$app->middleware(new Middlewares\ConcatNameMiddleware());
//*****************************************************
//------------------ CONTAINER -------------
/*
$container = $app->getContainer();

$container['MiddlewareThree'] = function ($c) {
    return new Middlewares\MiddlewareThree();
};


$app->middleware('MiddlewareThree');

$app->->getRouter()->getNamedRoute('home')->middleware(new Middlewares\MiddlewareOne());
*/
//------------------------------------------

$app->middleware(new Chiron\Middleware\RoutingMiddleware($app->getRouter()));

// only parse the body if the route is found (the routingmiddleware will throw exception if route is not found)
$app->middleware(new Chiron\Middleware\ParsedBodyMiddleware());

$app->middleware(new Chiron\Middleware\DispatcherMiddleware());
