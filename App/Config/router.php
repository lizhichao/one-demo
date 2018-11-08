<?php

/**
 * 路由设置
 */
use One\Http\Router;
Router::get('/', \App\Controllers\IndexController::class . '@index');


// orm 列子
require __DIR__.'/../Test/Orm/router.php';

// ws 列子
require __DIR__.'/../Test/Websocket/router.php';