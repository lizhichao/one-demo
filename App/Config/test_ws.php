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
        'server_type' => \One\Swoole\OneServer::SWOOLE_HTTP_SERVER,
        'port' => 8081,
        'action' => \App\Protocol\AppHttpServer::class,
        'mode' => SWOOLE_PROCESS,
        'sock_type' => SWOOLE_SOCK_TCP,
        'ip' => '0.0.0.0',
        'set' => [
        ],
    ],
    'add_listener' => [
        [
            'port' => 8082,
            'action' => \App\Test\WebSocket\Ws::class, // webSocket
            'type' => SWOOLE_SOCK_TCP,
            'ip' => '0.0.0.0',
            'set' => [
//                'open_http_protocol' => true
            ]
        ],
        [
            'port' => 8083,
            'action' => \App\Protocol\AppWebSocket::class, // webSocket带路由
            'type' => SWOOLE_SOCK_TCP,
            'ip' => '0.0.0.0',
            'set' => [
//                'open_http_protocol' => true
            ]
        ]
    ]
];
