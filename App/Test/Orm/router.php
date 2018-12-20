<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:46
 */

use One\Http\Router;

Router::group(['namespace'=>'App\\Test\\Orm'],function (){
    Router::get('insert','TestController@insert');
    Router::get('insert/all','TestController@insertAll');
    Router::get('update','TestController@update');
    Router::get('delete','TestController@delete');
    Router::get('find','TestController@find');
});