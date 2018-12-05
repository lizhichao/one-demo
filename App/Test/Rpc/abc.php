<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/2
 * Time: 16:46
 */

namespace App\Test\Rpc;

class abc
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
        echo __METHOD__ . ' a=' . $this->a . ' id=' . \Swoole\Coroutine::getuid() . PHP_EOL;
    }

    public function func()
    {
        echo __METHOD__ . ' a=' . $this->a . ' id=' . \Swoole\Coroutine::getuid() . PHP_EOL;

    }

    public function __destruct()
    {
        echo __METHOD__ . ' a=' . $this->a . ' id=' . \Swoole\Coroutine::getuid() . PHP_EOL;
    }

    public function setA($a)
    {
        $this->a = $a;
        return $this;
    }
}
