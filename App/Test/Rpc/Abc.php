<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/2
 * Time: 16:46
 */

namespace App\Test\Rpc;

class Abc
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function add($a, $b)
    {
        return $this->a + $a + $b;
    }

    public function __destruct()
    {

    }

    public function setA($a)
    {
        $this->a = $a;
        return $this;
    }
}
