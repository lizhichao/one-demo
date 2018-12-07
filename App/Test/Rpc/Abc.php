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

    /**
     * @param int $a
     * @param $b
     * @return int
     */
    public function add(int $a, $b)
    {
        return $this->a + $a + $b;
    }

    public static function asfaf()
    {

    }

    public function time(): string
    {
        return date('Y-m-d H:i:s');
    }

    public function setA($a)
    {
        $this->a = $a;
        return $this;
    }
}
