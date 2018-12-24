<?php

/**
 * 路由设置
 */

use One\Http\Router;

Router::get('/', \App\Controllers\IndexController::class . '@index');

Router::get('/rpc', \App\Controllers\IndexController::class . '@rpc');

Router::get('/data', \App\Controllers\IndexController::class . '@data');

Router::get('/users', [
    'use' => \App\Controllers\IndexController::class . '@userList',
    'as'  => 'users'
]);
Router::get('/user/{id}', [
    'use' => \App\Controllers\IndexController::class . '@user',
    'as'  => 'user'
]);

Router::get('/a/{name}', \App\Controllers\IndexController::class . '@aa');

Router::get('/b/`^log\_\d+$`', \App\Controllers\IndexController::class . '@zz');

// orm 列子
require __DIR__ . '/../Test/Orm/router.php';

// ws 列子
require __DIR__ . '/../Test/WebSocket/router.php';

// 混合协议通讯ss
require __DIR__ . '/../Test/MixPro/router.php';
