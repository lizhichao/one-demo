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
        'server_type' => \One\Swoole\OneServer::SWOOLE_HTTP_SERVER, // webSocket带路由
        'port' => 8081,
        'action' => \App\Protocol\AppHttpServer::class,
        'mode' => SWOOLE_PROCESS,
        'sock_type' => SWOOLE_SOCK_TCP,
        'ip' => '0.0.0.0',
        'set' => [
            'worker_num' => 5
        ],
        'global_data' => [
            'ip' => '127.0.0.1',
            'port' => 9086,
            'protocol' => \One\Protocol\Frame::class,
            'action' => \App\Client\GlobalDataClient::class,
            'time' => 0.5,
            'async' => 0,
            'set' => [
                'open_length_check'     => 1,
                'package_length_type'   => 'N',
                'package_length_offset' => 0,
                'package_body_offset'   => 0,
            ]
        ]
    ],
    'add_listener' => [
        [
            'port' => 8082,
            'action' => \App\Test\MixPro\WsPort::class,
            'type' => SWOOLE_SOCK_TCP,
            'ip' => '0.0.0.0',
            'set' => [
                'open_http_protocol' => false,
                'open_websocket_protocol' => true
            ]
        ],
        [
            'port' => 8083,
            'protocol' => \One\Protocol\Text::class,
            'action' => \App\Test\MixPro\TcpPort::class,
            'type' => SWOOLE_SOCK_TCP,
            'ip' => '0.0.0.0',
            'set' => [
                'open_http_protocol' => false,
                'open_websocket_protocol' => false
            ]
        ]
    ]
];
