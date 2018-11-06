<?php

return [
    'debug_log' => false,
    'default' => [
        'max_connect_count' => 10,
        'dns' => 'mysql:host=127.0.0.1;dbname=test',
        'username' => 'dev',
        'password' => 'redhat',
        'ops' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ],
    'test' => [
        'max_connect_count' => 10,
        'dns' => 'mysql:host=127.0.0.1;dbname=test',
        'username' => 'root',
        'password' => '123456',
        'ops' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ]
];
