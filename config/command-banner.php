<?php

return [
    'enabled' => env('COMMAND_BANNER_ENABLED', true),
    'environments' => [
        'production' => [
            'db:wipe',
            'migrate:fresh',
        ],
        'staging' => [
            //   'db:show'
        ],
    ],
];
