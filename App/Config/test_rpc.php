<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午5:23
 * websocket 服务器配置
 */

return [
    'server'       => [
        'server_type' => \One\Swoole\OneServer::SWOOLE_HTTP_SERVER,
        'port'        => 8081,
        'action'      => \App\Server\AppHttpServer::class,
        'mode'        => SWOOLE_PROCESS,
        'sock_type'   => SWOOLE_SOCK_TCP,
        'ip'          => '0.0.0.0',
        'set'         => [
            'worker_num' => 5
        ]
    ],
    'add_listener' => [
        [
            'port'   => 8082,
            'action' => \App\Server\RpcHttpPort::class,
            'type'   => SWOOLE_SOCK_TCP,
            'ip'     => '0.0.0.0',
            'set'    => [
                'open_http_protocol'      => true,
                'open_websocket_protocol' => false
            ]
        ]
    ]
];
