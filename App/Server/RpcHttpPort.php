<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/6
 * Time: 15:08
 */

namespace App\Server;

use One\Swoole\Listener\Http;

class RpcHttpPort extends Http
{
    use RpcTrait;

    public function onRequest(\swoole_http_request $request, \swoole_http_response $response)
    {
        $data = $request->rawContent();
        $str  = $this->callRpc($data, 1);
        $response->end($str);
    }
}