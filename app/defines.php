<?php

// TODO : regarder pourquoi cela plante ligne 26 si on retire le namespace !!!!
namespace Chiron;

// Some standard defines
define('Chiron\VERSION', '1.0');
define('Chiron\DS', '/');
define('Chiron\PHP_MIN_VERSION', '7.1');
define('Chiron\DEBUG_CONFIG', false);

// Base paths

//define('ROOT_DIR', realpath(dirname(__FILE__)).'/..');
//define('APP_DIR', ROOT_DIR .'/app/');

// TODO : ajouter le préfix de l'application devant la constante !!!!!
define('ROOT_DIR', realpath(__DIR__ . '/..'));

// The directory in which the non-public files reside.  Should be the same as the directory that this file is in.
if (!defined('APP_DIR')) {
    define('APP_DIR', str_replace(DIRECTORY_SEPARATOR, DS, __DIR__));
}

// Directories and Paths

define('Chiron\APP_DIR_NAME', basename(__DIR__));
define('Chiron\CACHE_DIR_NAME', 'cache');
define('Chiron\LOG_DIR_NAME', 'logs');
define('Chiron\VENDOR_DIR_NAME', 'vendor');

// Full path to Composer's vendor directory
define('Chiron\VENDOR_DIR', APP_DIR . DS . VENDOR_DIR_NAME);
