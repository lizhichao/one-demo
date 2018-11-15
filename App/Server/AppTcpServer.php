<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午4:59
 * 带路由Tcp
 */

namespace App\Server;

use One\Facades\Log;
use One\Http\Router;
use One\Http\RouterException;
use One\Protocol\TcpRouterData;
use One\Swoole\Server\TcpServer;

class AppTcp extends TcpServer
{

    /**
     * @param \swoole_server $server
     * @param $fd
     * @param $reactor_id
     * @param TcpRouterData $data
     */
    public function onReceive(\swoole_server $server, $fd, $reactor_id, $data)
    {
        $this->router($server,$fd,$reactor_id,$data);
    }
}