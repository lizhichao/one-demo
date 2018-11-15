<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午4:26
 */

namespace App\Server;

use One\Swoole\Listener\Http;

class AppHttpPort extends Http
{
    public function onRequest(\swoole_http_request $request, \swoole_http_response $response)
    {
        $this->router($request,$response);
    }
}