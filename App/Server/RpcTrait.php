<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/6
 * Time: 17:32
 */

namespace App\Server;


use One\Facades\Log;
use One\Swoole\RpcServer;

trait RpcTrait
{
    private function callRpc($data, $ide = 0)
    {
        $arr = msgpack_unpack($data);
        if (isset($arr['c'])) {
            Log::setTraceId($arr['i'] . '.' . uuid());
            $str = RpcServer::call($arr);
            Log::flushTraceId();
        } else if (isset($arr['i'])) {
            $str = RpcServer::close($arr['i']);
        } else if ($ide === 1) {
            $str = 'rpc server';
        } else {
            $str = 'params error';
        }
        return $str;

    }
}