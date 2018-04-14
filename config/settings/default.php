<?php
    /**
     * Core configuration file for UserFrosting.  You must override/extend this in your site's configuration file.
     *
     * Sensitive credentials should be stored in an environment variable or your .env file.
     * Database password: DB_PASSWORD
     * SMTP server password: SMTP_PASSWORD
     */
    return [
        'address_book' => [
            'admin' => [
                'email' => getenv('SMTP_USER') ?: null,
                'name'  => 'Site Administrator'
            ]
        ],
        'alert' => [
            'storage'   => 'session', // Set to one of `cache` or `session`
            'key'       => 'site.alerts', // the key to use to store flash messages
        ],
        'assets' => [
            'compiled' => [
                'path'   => 'assets',
                'schema' => 'bundle.result.json'
            ],
            'raw' => [
                'path'   => 'assets-raw',
                'schema' => 'asset-bundles.json'
            ],
            'use_raw'  => true
        ],
        'cache' => [
            'driver' => 'file', // Set to one of `file`, `memcached`, `redis`
    	    'prefix' => 'userfrosting', // Edit prefix to something unique when multiple instance of memcached/redis are used on the same server
            'memcached' => [
                'host' => '127.0.0.1',
                'port' => 11211,
                'weight' => 100
            ],
            'redis' => [
                'host' => '127.0.0.1',
                'password' => null,
                'port' => 6379,
                'database' => 0
            ],
            'twig' => false
        ],
        // CSRF middleware settings (see https://github.com/slimphp/Slim-Csrf)
        'csrf' => [
            'name'             => 'csrf',
            'storage_limit'    => 200,
            'strength'         => 16,
            'persistent_token' => true,
            // A list of url paths to ignore CSRF checks on
            'blacklist' => [
                // URL paths will be matched against each regular expression in this list.
                // Each regular expression should map to an array of methods.
                // Regular expressions will be delimited with ~ in preg_match, so if you
                // have routes with ~ in them, you must escape this character in your regex.
                // Also, remember to use ^ when you only want to match the beginning of a URL path!
            ]
        ],
        'db'    =>  [
            'driver'    => getenv('DB_DRIVER') ?: 'mysql',
            'host'      => getenv('DB_HOST') ?: null,
            'port'      => getenv('DB_PORT') ?: null,
            'database'  => getenv('DB_NAME') ?: null,
            'username'  => getenv('DB_USER') ?: null,
            'password'  => getenv('DB_PASSWORD') ?: null,
            'timeout'   => 15,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ],
        'debug' => [
            'queries' => false,
            'smtp' => false,
            'twig' => false
        ],
        'mail'  => [
            // Debug mode will echo connection status alerts to
            // the screen throughout the email sending process.
            // Very helpful when testing your credentials.
            'debug_mode'    => false,
            'host'          => getenv('SMTP_HOST') ?: null,
            'port'          => '25',
            'secure'        => null, // null, 'ssl', or 'tls'
            'auth'          => true, // true if authorization required
            'username'      => getenv('SMTP_USER') ?: null,
            'password'      => getenv('SMTP_PASSWORD') ?: null,
            // NERD ONLY VARIABLE: You may want to change the origin
            // of the HELO request, as having the default value of
            // "localhost" may cause the email to be considered spam.
            // http://stackoverflow.com/questions/5294478/significance-of-localhost-in-helo-localhost
            'localhost'     => 'localhost', // rename to the URL you want as origin of email
/*
            'mailer'     => 'smtp',     // Set to one of 'smtp', 'mail', 'qmail', 'sendmail'
            'host'       => getenv('SMTP_HOST') ?: null,
            'port'       => 587,
            'auth'       => true,
            'secure'     => 'tls',
            'username'   => getenv('SMTP_USER') ?: null,
            'password'   => getenv('SMTP_PASSWORD') ?: null,
            'smtp_debug' => 4,
            'message_options' => [
                'CharSet' => 'UTF-8',
                'isHtml' => true,
                'Timeout' => 15
            ]
*/
        ],
        // Filesystem paths
        'path'    => [
//            'document_root'     => str_replace(DIRECTORY_SEPARATOR, \UserFrosting\DS, $_SERVER['DOCUMENT_ROOT']),
            'public_relative'   => dirname($_SERVER['SCRIPT_NAME'])      // The location of `index.php` relative to the document root.  Use for sites installed in subdirectories of your web server's document root.
        ],
        'session' => [
            'handler'       => 'file',
            // Config values for when using db-based sessions
            'database'      => [
                'table' => 'sessions'
            ],
            'name'          => 'uf4',
            'minutes'       => 120,
            'cache_limiter' => false,
            // Decouples the session keys used to store certain session info
            'keys' => [
                'csrf'    => 'site.csrf',      // the key (prefix) used to store an ArrayObject of CSRF tokens.
            ]
        ],
        // App settings - see http://www.slimframework.com/docs/objects/application.html#slim-default-settings
        'settings' => [
            'basePath' => '',
            'displayErrorDetails' => true,
            'httpVersion' => '1.1',
            'charset' => 'UTF-8', // TODO : vérifier l'utilité de ce paramétre qui n'existe pas dans Slim !!!!!
            'responseChunkSize' => 4096,
            'outputBuffering' => 'append',
            'determineRouteBeforeAppMiddleware' => false,
            'addContentLengthHeader' => true,
            'routerCacheFile' => false
        ],
        // "Site" settings that are automatically passed to Twig
        'site' => [
            'AdminLTE' =>  [
                'skin' => 'blue'
            ],
            'analytics' => [
                'google' => [
                    'code' => '',
                    'enabled' => false
                ]
            ],
            'author'    =>      'Author',
            'csrf'      => null,  // Do not set this variable.  The core Twig extension will override it with values from the CSRF service.
            'debug'     => [
                'ajax' => false,
                'info' => true
            ],
            'locales' =>  [
                // Should be ordered according to https://en.wikipedia.org/wiki/List_of_languages_by_total_number_of_speakers,
                // with the exception of English, which as the default language comes first.
                'available' => [
                    'en_US' => 'English',
                    'zh_CN' => '中文',
                    'es_ES' => 'Español',
                    'ar'    => 'العربية',
                    'pt_PT' => 'Português',
                    'ru_RU' => 'русский',
                    'de_DE' => 'Deutsch',
                    'fr_FR' => 'Français',
                    'tr'    => 'Türk',
                    'it_IT' => 'Italiano',
                    'th_TH' => 'ภาษาไทย',
                    'fa'    => 'فارسی'
                ],
                // This can be a comma-separated list, to load multiple fallback locales
                'default' => 'en_US'
            ],
            'title'     =>      'UserFrosting',
            // Global ufTable settings
            'uf_table' => [
                'use_loading_transition' => true
            ],
            // URLs
            'uri' => [
                'base' => [
                    'host'              => isset($_SERVER['SERVER_NAME']) ? trim($_SERVER['SERVER_NAME'], '/') : 'localhost',
                    'scheme'            => empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off' ? 'http' : 'https',
                    'port'              => isset($_SERVER['SERVER_PORT']) ? (int) $_SERVER['SERVER_PORT'] : null,
                    'path'              => isset($_SERVER['SCRIPT_NAME']) ? trim(dirname($_SERVER['SCRIPT_NAME']), '/\\') : ''
                ],
                'author'            => 'https://www.userfrosting.com',
                'publisher'         => ''
            ]
        ],
        'php' => [
            'timezone'          => 'Europe/Paris',
            'error_reporting'   => E_ALL,  // Development - report all errors and suggestions
            'log_errors'        => 'false',
            'display_errors'    => 'false',
        ]
    ];