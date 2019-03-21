<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/3/21
 * Time: 14:50
 */

define('_SHELL_', true);

define('_APP_PATH_', __DIR__);

define('_APP_PATH_VIEW_', __DIR__ . '/View');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/lizhichao/one/src/run.php';
require __DIR__ . '/config.php';

new \App\Test\OrmTest();