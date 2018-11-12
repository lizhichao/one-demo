<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/12
 * Time: 10:42
 */

namespace App\Test\MixPro;


use One\Swoole\WebSocket;

class Ws extends WebSocket
{
    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {

    }
}