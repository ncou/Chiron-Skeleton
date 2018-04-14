<?php


// TODO : regarder pourquoi cela plante ligne 26 si on retire le namespace !!!!
namespace Chiron;

// Some standard defines
define('Chiron\VERSION', '1.0');
define('Chiron\DS', '/');
define('Chiron\PHP_MIN_VERSION', '7.1');
define('Chiron\DEBUG_CONFIG', false);

// Base paths
//define('Chiron\ROOT_DIR', realpath(__DIR__ . '/..'));
define('Chiron\ROOT_DIR', realpath(__DIR__ . DS . '..'));
//define('WINDWALKER_ROOT', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));

// The directory in which the non-public files reside.  Should be the same as the directory that this file is in.
if (!defined('Chiron\APP_DIR')) {
    define('Chiron\APP_DIR', str_replace(DIRECTORY_SEPARATOR, DS, __DIR__));
}


// Directories and Paths
define('Chiron\APP_DIR_NAME', basename(__DIR__));
define('Chiron\CONFIG_DIR_NAME', 'config');
define('Chiron\CACHE_DIR_NAME', 'cache');
define('Chiron\LOG_DIR_NAME', 'logs');
define('Chiron\PUBLIC_DIR_NAME', 'public');
define('Chiron\TEMPLATES_DIR_NAME', 'templates');
define('Chiron\VENDOR_DIR_NAME', 'vendor');

// Full path to Composer's vendor directory
define('Chiron\VENDOR_DIR', APP_DIR . DS . VENDOR_DIR_NAME);

define('Chiron\CONFIG_DIR', ROOT_DIR . DS . CONFIG_DIR_NAME);
define('Chiron\TEMPLATES_DIR', ROOT_DIR . DS . TEMPLATES_DIR_NAME);

/*
define('WINDWALKER_ROOT', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));
define('WINDWALKER_BIN', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'bin');
define('WINDWALKER_CACHE', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'cache');
define('WINDWALKER_ETC', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'etc');
define('WINDWALKER_LOGS', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'logs');
define('WINDWALKER_RESOURCES', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'resources');
define('WINDWALKER_SOURCE', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'src');
define('WINDWALKER_TEMP', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'tmp');
define('WINDWALKER_TEMPLATES', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'templates');
define('WINDWALKER_VENDOR', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'vendor');
define('WINDWALKER_PUBLIC', WINDWALKER_ROOT . DIRECTORY_SEPARATOR . 'www');
*/
