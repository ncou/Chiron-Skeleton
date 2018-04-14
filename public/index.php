<?php

/*
 * Chiron App Skeleton V0.1
 */

require __DIR__ . '/../vendor/autoload.php';

//require __DIR__ . '/../app/defines.php';








//https://github.com/zendframework/zf3-web/blob/master/public/index.php
// Delegate static file requests back to the PHP built-in webserver
/*
if (PHP_SAPI === 'cli-server'
    && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}
chdir(dirname(__DIR__));
require 'vendor/autoload.php';
*/
/**
 * Self-called anonymous function that creates its own scope and keep the global namespace clean.
 */
/*
(function () {
    // @var \Psr\Container\ContainerInterface $container
    $container = require 'config/container.php';
    // @var \Zend\Expressive\Application $app
    $app = $container->get(\Zend\Expressive\Application::class);
    // Import programmatic/declarative middleware pipeline and routing
    // configuration statements
    require 'config/pipeline.php';
    require 'config/routes.php';
    $app->run();
})();
*/












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

// TODO : regarder pour améliorer ici : https://github.com/juliangut/slim-session-middleware/blob/master/src/SessionMiddleware.php
//https://github.com/dappur/framework/blob/master/public/index.php
session_start();
session_set_cookie_params(null, null, null, null, true);

//https://github.com/juliangut/cacheware/blob/master/src/CacheWare.php#L56
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

// TODO : à définir dans un fichier de conf !!!!
//setlocale(LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
setlocale(LC_TIME, ['fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra']);

//$base_path = "/nano5/public";
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

// read the credentials from the .env file
$dotenv = new \Chiron\Utils\DotEnv();
$dotenv->load(\Chiron\APP_DIR . '/.env');

// TODO : il faut que cette configuration soit effectuée dans le fichier index.php, pas ici !!!!!!
$loader = new \Utils\FileLoader([\Chiron\CONFIG_DIR . '/settings/default.php', \Chiron\CONFIG_DIR . '/settings/dev.php', \Chiron\CONFIG_DIR . '/settings/down.php']);
$settings = $loader->load();

// Instantiate the app
//$settings = require __DIR__ . '/../src/settings.php';
//$app = new \Chiron\Application(['basePath' => $base_path]); //$settings);
$app = new \Chiron\Application($settings);

// Set up dependencies and start session
require \Chiron\CONFIG_DIR . '/container.php';
// Register routes
require \Chiron\CONFIG_DIR . '/routes.php';
//require __DIR__ . '/../src/routes2.php';
// Set up middlewares
require \Chiron\CONFIG_DIR . '/middlewares.php';


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
//$app->run($request);
$app->run();
