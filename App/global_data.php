<?php
/**
 * global data 运行这个文件
 * php swoole.php
 */
define('_APP_PATH_',__DIR__);

define('_APP_PATH_VIEW_',__DIR__.'/View');

require __DIR__.'/../One/run.php';

\One\Swoole\OneServer::setConfig(config('global_data'));

\One\Swoole\OneServer::runAll();



