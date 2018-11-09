<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:46
 */

use One\Http\Router;


Router::get('/ws',\App\Test\HttpController::class.'@ws');
Router::get('/ws/router',\App\Test\HttpController::class.'@wsRouter');

Router::group(['namespace'=>'App\\Test\\WebSocket'],function (){
    Router::set('ws','/a','TestController@abc');
    Router::set('ws','/b','TestController@bbb');
});