<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午4:59
 */

namespace App\Server;

use One\Swoole\Server\WsServer;

class AppWsServer extends WsServer
{
    public function onHandShake(\swoole_http_request $request, \swoole_http_response $response)
    {
        return parent::onHandShake($request, $response);
    }

    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $this->router($server,$frame);
    }

    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request)
    {
//        $this->session[$request->fd]->get('user');
        return true;
    }

    public function onClose(\swoole_server $server, $fd, $reactor_id)
    {
        parent::onClose($server, $fd, $reactor_id);
        unset($this->session[$fd]);
    }
}