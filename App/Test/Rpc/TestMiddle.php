<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/14
 * Time: 10:32
 */

namespace App\Test\Rpc;

class TestMiddle
{
    public function aa($next, ...$arg)
    {
        return $next();
    }
}
