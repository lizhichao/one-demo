<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:40
 */

namespace App\Test\WebSocket;


use One\Swoole\Listener\Ws;

class WsPort extends Ws
{
    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $server->push($frame->fd,__METHOD__.$frame->data);
    }
}