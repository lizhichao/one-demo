<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:46
 */

use One\Http\Router;

Router::group(['namespace'=>'App\\Test\\Websocket'],function (){
    Router::set('ws','/a','TestController@abc');
    Router::set('ws','/b','TestController@bbb');
});