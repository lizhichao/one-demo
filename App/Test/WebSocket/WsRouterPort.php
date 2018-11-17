<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:40
 */

namespace App\Test\WebSocket;


use One\Facades\Log;
use One\Http\Router;
use One\Http\RouterException;
use One\Swoole\Server\WsServer;

class WsRouterPort extends WsServer
{
    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $this->wsRouter($server,$frame);
    }
}