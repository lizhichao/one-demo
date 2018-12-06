<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/6
 * Time: 15:08
 */

namespace App\Server;

use One\Facades\Log;
use One\Swoole\RpcServer;
use One\Swoole\Server\HttpServer;
use One\Swoole\Server\TcpServer;
use One\Swoole\Server\WsServer;

class RpcWsServer extends WsServer
{
    use RpcTrait;

    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $str = $this->callRpc($frame->data);
        $server->push($frame->fd, $str);
    }
}