<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:46
 */

use One\Http\Router;
use App\Test\MixPro\HttpController;

Router::get('/mix', [
    'use'    => HttpController::class . '@index',
    'middle' => [\App\Test\MixPro\TestMiddle::class . '@isLogin']
]);

Router::group(['middle' => [\App\Test\MixPro\TestMiddle::class . '@checkSession']], function () {
    Router::get('/mix/ws', HttpController::class . '@ws');
    Router::get('/mix/http', HttpController::class . '@http');
    Router::post('/mix/http/loop', HttpController::class . '@httpLoop');
    Router::post('/mix/http/send', HttpController::class . '@httpSend');
});
