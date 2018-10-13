<?php
    /**
     * Core configuration file for UserFrosting.  You must override/extend this in your site's configuration file.
     *
     * Sensitive credentials should be stored in an environment variable or your .env file.
     * Database password: DB_PASSWORD
     * SMTP server password: SMTP_PASSWORD
     */
    return [
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
        'templates' => [
            'extension' => 'html',
            'paths'     => [\Chiron\TEMPLATES_DIR],
        ],
        'php' => [
            'timezone'          => 'Europe/Paris',
            'error_reporting'   => E_ALL,  // Development - report all errors and suggestions
            'log_errors'        => 'false',
            'display_errors'    => 'false',
        ]
    ];