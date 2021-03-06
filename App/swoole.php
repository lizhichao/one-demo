<?php
/**
 * swoole 运行这个文件
 * php swoole.php
 */
define('_APP_PATH_', __DIR__);

define('_APP_PATH_VIEW_', __DIR__ . '/View');

//define('_DEBUG_',true);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/lizhichao/one/src/run.php';
require __DIR__ . '/config.php';

\One\Http\Router::loadRouter();

require _APP_PATH_ . '/Config/rpc.php';

\One\Swoole\OneServer::setConfig(config(isset($argv[1]) ? $argv[1] : 'protocol'));
\One\Swoole\Client\Tcp::setConfig(config('client'));

\Swoole\Runtime::enableCoroutine();
\One\Swoole\OneServer::runAll();



