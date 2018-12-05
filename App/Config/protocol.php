<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/8/24
 * Time: 下午5:23
 * http,websocket,tcp 服务器配置
 */

return [
    'server' => [
        'server_type' => \One\Swoole\OneServer::SWOOLE_HTTP_SERVER,
        'port' => 8081,
        'action' => \App\Server\AppHttpServer::class,
        'mode' => SWOOLE_BASE,
        'sock_type' => SWOOLE_SOCK_TCP,
        'ip' => '0.0.0.0',
        'set' => [
        ],
//        'global_data' => [ //globalData 配置
//            'ip' => '127.0.0.1',
//            'port' => 9086,
//            'protocol' => \One\Protocol\Frame::class,
//            'action' => \App\GlobalData\Client::class,
//            'time' => 0.5,
//            'async' => 0,
//            'set' => [
//                'open_length_check'     => 1,
//                'package_length_type'   => 'N',
//                'package_length_offset' => 0,
//                'package_body_offset'   => 0,
////                'open_length_check' => 1,
////                'package_length_func' => '\One\Protocol\Frame::length',
////                'package_body_offset' => \One\Protocol\Frame::HEAD_LEN,
//
//            ]
//        ]
    ]
];
