<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/6
 * Time: 15:50
 */

use \One\Swoole\RpcServer;

RpcServer::group(['middle' => [\App\Test\Rpc\TestMiddle::class . '@aa'], 'cache' => 10], function () {
    RpcServer::add(\App\Test\Rpc\Abc::class);
    RpcServer::add(\App\Test\Orm\User::class);
});
