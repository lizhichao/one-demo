<?php
return [
    'drive' => 'redis', // [file | redis] 调用Cache:: 相关方法使用的缓存驱动

    'file' => [
        'path' => _APP_PATH_ . '/RunCache/cache', //文件缓存位置
        'prefix' => 'one_' //文件前缀
    ],

    'redis' => [ // redis配置
        'default' => [  // 默认配置方法
            'max_connect_count' => 10, // 连接池最大数量
            'host' => '127.0.0.1',
            'port' => 6378,
            'prefix' => 'one_'
        ]
    ]
];

