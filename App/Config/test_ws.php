<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午5:23
 * websocket 服务器配置
 */

return [
    'server' => [
        'server_type' => \One\Swoole\OneServer::SWOOLE_WEBSOCKET_SERVER,
        'port' => 8081,
        'action' => \App\Protocol\AppWebSocket::class,
        'mode' => SWOOLE_PROCESS,
        'sock_type' => SWOOLE_SOCK_TCP,
        'ip' => '0.0.0.0',
        'set' => [
        ],
    ],
    ''
];
