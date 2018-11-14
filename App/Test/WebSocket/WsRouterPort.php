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
use One\Swoole\Listener\Ws;

class WsRouterPort extends Ws
{
    public function onHandShake(\swoole_http_request $request, \swoole_http_response $response)
    {
        return parent::onHandShake($request, $response);
    }

    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $info = json_decode($frame->data, true);
        if (!$info || !isset($info['u']) || !isset($info['d'])) {
            $this->server->push($frame->fd, '格式错误');
            return false;
        }
        $frame->body = $info['d'];
        $frame->uuid = uuid();
        Log::setTraceId($frame->uuid);
        try {
            $router = new Router();
            list($frame->class, $frame->method, $mids, $action, $frame->args) = $router->explain('ws', $info['u'], $frame, $this->server, $this->session[$frame->fd]);
            $f = $router->getExecAction($mids, $action, $frame, $this->server, $this->session[$frame->fd]);
            $data = $f();
        } catch (RouterException $e) {
            $data = $e->getMessage();
        } catch (\Throwable $e) {
            $data = $e->getMessage();
        }

        if ($data) {
            $server->push($frame->fd, $data);
        }
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