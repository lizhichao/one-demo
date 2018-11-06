<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/22
 * Time: 15:57
 */

return [
    'server' => [
        'server_type' => \One\Swoole\OneServer::SWOOLE_SERVER,
        'port' => 9086,
        'action' =>\One\Swoole\GlobalDataServer::class,
        'mode' => SWOOLE_BASE,
        'sock_type' => SWOOLE_SOCK_TCP,
        'ip' => '127.0.0.1',
        'protocol' => \One\Protocol\Frame::class,
        'set' => [
            'worker_num' => 1,
            'reactor_num' => 1,
            'open_length_check' => 1,
            'package_length_func' => '\One\Protocol\Frame::length',
            'package_body_offset' => \One\Protocol\Frame::HEAD_LEN,
        ]
    ]
];
