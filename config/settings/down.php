<?php
    /**
     * Default development config file for UserFrosting. Sets up UserFrosting for easier development.
     *
     */
    return [
        'settings' => [
            'isDownForMaintenance' => false,
            'maintenanceRetryAfter' => new DateTime('2018-12-24') //120 // number of seconds, or a DateTimeInterface with the timestamp when the site will be back.
        ]
    ];