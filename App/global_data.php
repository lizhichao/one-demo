<?php
/**
 * global data 运行这个文件
 * php global_data.php
 */
define('_APP_PATH_',__DIR__);

define('_APP_PATH_VIEW_',__DIR__.'/View');

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../vendor/lizhichao/one/src/run.php';

\One\Swoole\OneServer::setConfig(config('global_data'));

\One\Swoole\OneServer::runAll();



