<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午4:59
 * 带路由Tcp
 */

namespace App\Protocol;

use One\Facades\Log;
use One\Http\Router;
use One\Http\RouterException;
use One\Protocol\TcpRouterData;
use One\Swoole\Server;

class AppTcp extends Server
{

    /**
     * @param \swoole_server $server
     * @param $fd
     * @param $reactor_id
     * @param TcpRouterData $data
     */
    public function onReceive(\swoole_server $server, $fd, $reactor_id, $data)
    {
        $data->uuid = $data->uuid . '.' . uuid();
        $data->fd = $fd;
        Log::setTraceId($data->uuid);
        try {
            $router = new Router();
            list($data->class, $data->method, $mids, $action, $data->args) = $router->explain('tcp', $data['url'], $data, $this);
            $f = $router->getExecAction($mids, $action, $data, $this);
            $res = $f();
        } catch (RouterException $e) {
            $res = $e->getMessage();
        } catch (\Throwable $e) {
            $res = $e->getMessage();
        }

        if ($res) {
            $server->send($fd, $res);
        }

    }
}