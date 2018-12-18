<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午4:26
 */

namespace App\Server;


use App\GlobalData\Client;
use One\Swoole\Server\HttpServer;

class AppHttpServer extends HttpServer
{
    /**
     * @var Client
     */
    public $client;

    public function __construct(\swoole_server $server, array $conf)
    {
        parent::__construct($server, $conf);
        $this->client = new Client();
    }

    public function onRequest(\swoole_http_request $request, \swoole_http_response $response)
    {
        $this->httpRouter($request,$response);
    }
}