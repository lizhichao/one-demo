<?php
return [
    'drive' => 'redis', // file | redis

    'file' => [
        'path' => _APP_PATH_ . '/RunCache/cache',
        'prefix' => 'one_'
    ],

    'redis' => [
        'default' => [
            'max_connect_count' => 10,
            'host' => '127.0.0.1',
            'port' => 6379,
            'prefix' => 'one_'
        ]
    ]
];

