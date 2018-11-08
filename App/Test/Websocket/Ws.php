<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:40
 */

namespace App\Test\Websocket;


use One\Swoole\WebSocket;

class Ws extends WebSocket
{
    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $server->push($frame->fd,$frame->data);
    }
}