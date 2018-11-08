<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午4:59
 */

namespace App\Protocol;


use One\Facades\Log;
use One\Http\Router;
use One\Http\RouterException;
use One\Swoole\WebSocket;

class AppWebSocket extends WebSocket
{
    public function onHandShake(\swoole_http_request $request, \swoole_http_response $response)
    {
        return parent::onHandShake($request, $response);
    }

    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $info = json_decode($frame->data, true);
        $frame->uuid = uuid();
        Log::setTraceId($frame->uuid);
        try {
            $router = new Router();
            list($frame->class, $frame->method, $mids, $action, $frame->args) = $router->explain('ws', $info['uri'], $frame, $this, $this->session[$frame->fd]);
            $f = $router->getExecAction($mids, $action, $frame, $this, $this->session[$frame->fd]);
            $data = $f();
        } catch (RouterException $e) {
            $data = $e->getMessage();
        } catch (\Throwable $e) {
            $data = $e->getMessage();
        }

        if ($data) {
            $server->push($data, $frame->fd);
        }
    }

    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request)
    {
        return true;
    }
}