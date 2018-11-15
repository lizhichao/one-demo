<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午4:26
 */

namespace App\Server;


use App\Exceptions\Handler;
use One\Exceptions\HttpException;
use One\Facades\Log;
use One\Http\Router;
use One\Http\RouterException;
use One\Swoole\Server\HttpServer;

class AppHttpServer extends HttpServer
{
    public function onRequest(\swoole_http_request $request, \swoole_http_response $response)
    {
        $this->router($request,$response);
    }
}