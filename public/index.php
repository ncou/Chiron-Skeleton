<?php

/*
 * Nano v0.1.0
 */

// TODO : créer un fichier "composer.json" qui se chargera de faire un load du fichier defines.php et ensuite des autres classes !!!!
/*
"autoload": {
        "files" : [
            "app/defines.php"
        ],
        "psr-4": {
            "UserFrosting\\System\\": "app/system/"
        }
    }
    */

require __DIR__ . '/../vendor/autoload.php';

//require __DIR__ . '/../app/defines.php';







// TODO : créer un fichier bootstrap.php avec toutes les infos du dessous (locale/define/require...etc).
//require 'lib/bootstrap.php';



// TODO : créer un autoloader comme ici : https://github.com/litek/silex-skeleton/blob/master/autoload.php


/*
//https://github.com/litek/silex-skeleton/blob/master/public/index.php
require __DIR__.'/../autoload.php';
$app = require APP_PATH.'/app.php';
$app->run();

// Ou alors :

require __DIR__.'/../vendor/autoload.php';
$app = new Silex\Application();
$app['debug'] = true;
require __DIR__.'/../app/config/config.php';
require __DIR__.'/../src/Yameveo/Infrastructure/Silex/services.php';
require __DIR__.'/../src/Yameveo/Infrastructure/Silex/routes.php';
$app->run();

*/


//https://github.com/dappur/framework/blob/master/public/index.php
session_start();
session_set_cookie_params(null, null, null, null, true);



// Prevent headers from being automatically sent to client
/*
ini_set('session.use_trans_sid', false);
ini_set('session.use_cookies', true);
ini_set('session.use_only_cookies', true);
ini_set('session.use_strict_mode', false);
ini_set('session.cache_limiter', '');
*/




/*
// Load Vendor Autoload
require __DIR__ . '/../vendor/autoload.php';
// Load Settings
$settings_file = file_get_contents(__DIR__ . '/../app/bootstrap/settings.json');
$settings = json_decode($settings_file, TRUE);
$app = new Slim\App(array('settings' => $settings));
// Load Dependancies
require __DIR__ . '/../app/bootstrap/dependencies.php';
// Load Controllers
require __DIR__ . '/../app/bootstrap/controllers.php';
// Load Routes
foreach (glob(__DIR__ . '/../app/routes/*.php') as $filename)
{
    require $filename;
}
//Load Error Handlers
require __DIR__ . '/../app/bootstrap/errors.php';
*/




//*******************************
// TODO : regarder dans konoha comment c'est fait, ils utilisent un fichier bootstrap => https://github.com/kohana/kohana/blob/98674c63399c29c0fdb812c04c99dc1c6ca5aec8/application/bootstrap.php
//*******************************

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
//chdir(dirname(__DIR__));

//setlocale(LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
setlocale(LC_TIME, ['fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra']);




$base_path = "/chichi/public";
//$base_path = realpath(__DIR__.'/../');
$charset = "UTF-8";

// Config the base URL
//define("BASE_URL", $base_path); // Base URL including trailing slash (e.g. http://localhost/)

// stop PHP sending a Content-Type automatically
// TODO : on devrait peut etre ajouter cela dans les propriétés de l'application. il faut y réfléchir
ini_set('default_mimetype', '');

// Encoding
ini_set('default_charset', $charset);
if (extension_loaded('mbstring')) {
    mb_internal_encoding($charset);
}
/*
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');
*/

/*
require __DIR__ . '/../core/Interfaces/MiddlewareInterface.php';
require __DIR__ . '/../core/Interfaces/RequestHandlerInterface.php';
require __DIR__ . '/../core/Interfaces/StreamInterface.php';
require __DIR__ . '/../core/Interfaces/UriInterface.php';
require __DIR__ . '/../core/Interfaces/MessageInterface.php';
require __DIR__ . '/../core/Interfaces/ResponseInterface.php';
require __DIR__ . '/../core/Interfaces/RequestInterface.php';
require __DIR__ . '/../core/Interfaces/ServerRequestInterface.php';
require __DIR__ . '/../core/Interfaces/ContainerInterface.php';
require __DIR__ . '/../core/Interfaces/ServerRequestFactoryInterface.php';

require __DIR__ . '/../core/Handlers/HttpExceptionFormatterInterface.php';

require __DIR__ . '/../core/Handlers/Formatter/Json.php';
require __DIR__ . '/../core/Handlers/Formatter/Xml.php';
require __DIR__ . '/../core/Handlers/Formatter/Html.php';
require __DIR__ . '/../core/Handlers/Formatter/Text.php';

require __DIR__ . '/../core/Handlers/FlattenException.php';

require __DIR__ . '/../core/ErrorHandler/AbstractExceptionHandler.php';
require __DIR__ . '/../core/ErrorHandler/HttpExceptionHandler.php';
require __DIR__ . '/../core/ErrorHandler/MaintenanceHandler.php';


require __DIR__ . '/../core/Interfaces/LoggerInterface.php';
require __DIR__ . '/../core/Logger/LogLevel.php';
require __DIR__ . '/../core/Logger/AbstractLogger.php';
require __DIR__ . '/../core/Logger/Logger.php';
require __DIR__ . '/../core/Logger/NullLogger.php';


require(ROOT_DIR .'/core/autoload.php');
Autoload::loadClasses(array(
  ROOT_DIR .'/core/',
  ROOT_DIR .'/core/Exceptions/',
  ROOT_DIR .'/core/Mvc/',
  ROOT_DIR .'/core/Stack/',
  ROOT_DIR .'/core/Config/',
  ROOT_DIR .'/core/Middleware/',
  ROOT_DIR .'/core/Components/',
  ROOT_DIR .'/core/Routing/',
  ROOT_DIR .'/core/Http/',
  ROOT_DIR .'/core/Handlers/',
  ROOT_DIR .'/core/Handlers/Strategies/',
  APP_DIR . '/controllers/',
  APP_DIR . '/middlewares/',
  APP_DIR . '/helpers/',
  APP_DIR . '/models/',
  APP_DIR . '/plugins/',
  //add your paths here
));

// TODO : utiliser un autoloader pour éviter d'instancier cette classe
require(ROOT_DIR .'/core/Components/Container.php');
require(ROOT_DIR .'/core/Application.php');
*/










// Start a session
//session_start();

// TODO : à mettre ailleur, c'est une config du PHP !!!!!!!!!!
// PHP settings for DEV or PROD debug mode

//if ($_SERVER['APP_ENVIRONMENT'] == 'DEV') {
//  ini_set('display_errors', '1');
  //error_reporting(E_ALL);
//  error_reporting(E_ALL ^ (E_USER_WARNING | E_NOTICE | E_USER_NOTICE));

//  error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE );

//} else {
//  ini_set('display_errors', '0');
//  error_reporting(NULL);
//}

//-------------------------------------

// Load the routes to dispatch the request
//require(ROOT_DIR .'core/routes.php');


//error_reporting(E_USER_ERROR);
//error_reporting(E_ALL);


// Instantiate the app
//$settings = require __DIR__ . '/../src/settings.php';
$app = new \Chiron\Application(['basePath' => $base_path]); //$settings);

// TODO : mieux gérer ce cas ????
//https://laracasts.com/discuss/channels/general-discussion/laravel-5-maintenance-mode
//https://github.com/BootstrapCMS/CMS/blob/master/app/Http/Middleware/CheckForMaintenanceMode.php
//https://github.com/ladybirdweb/momo-email-listener/blob/master/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/CheckForMaintenanceMode.php
//https://github.com/jimrubenstein/laravel-framework/blob/master/src/Illuminate/Foundation/Http/Middleware/CheckForMaintenanceMode.php
/*
if ($app->isDownForMaintenance())
{
    die("We're currently down for maintenance.");
    //$app->halt("We're currently down for maintenance.", 503, ['Retry-After' => 5 * 60]);
}*/


// Set up dependencies and start session
require ROOT_DIR . '/config/container.php';
// Register routes
require ROOT_DIR . '/config/routes.php';
//require __DIR__ . '/../src/routes2.php';
// Set up middlewares
require ROOT_DIR . '/config/middlewares.php';


// TODO : disabling the errorHandler
//unset($app['errorHandler']);
//unset($app['404notFoundHandler']);


/*
$request = (new ServerRequestFactory())->createServerRequestFromArray($_SERVER);

// try to login with cookie data
// TODO : c'est perturbant de devoir faire ->cookies()->XXX avec les parenthéses et pas directement ->cookies->XXX

// TODO : à déplacer dans un middleware !!!!!
$cookie = $request->getCookieParam('rememberme');

if (!empty($cookie)) {
    //$cookie = $request->cookies()->get('rememberme');
    $isLogged = (new UserController($app))->loginWithCookieData2($cookie);

    $request = $request->withAttribute('isLogged', $isLogged);
}*/


// Run app
$app->run($request);
