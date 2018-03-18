<?php
    /**
     * Default development config file for Chiron. Sets up UserFrosting for easier development.
     *
     */
    return [
        'assets' => [
            'use_raw' => true
        ],
        'cache' => [
            'twig' => false
        ],
        'debug' => [
            'twig' => true,
            'auth' => true,
            'smtp' => true
        ],
        // Slim settings - see http://www.slimframework.com/docs/objects/application.html#slim-default-settings
        'settings' => [
            'displayErrorDetails' => true
        ],
        'site' => [
            'debug' => [
                'ajax' => true,
                'info' => true
            ]
        ],
        'php' => [
            'error_reporting'   => E_ALL ^ (E_USER_WARNING | E_NOTICE | E_USER_NOTICE),  // Development - report all errors except Warning & Notice
            'log_errors'        => 'false',
            'display_errors'    => 'true'
        ]
    ];