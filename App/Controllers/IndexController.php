<?php

namespace App\Controllers;

use App\Test\Rpc\abc;
use App\Test\Rpc\TestMiddle;
use One\Http\Controller;
use One\Swoole\Rpc\Server;

class IndexController extends Controller
{
    public function index()
    {
        Server::group(['middle' => [TestMiddle::class . '@aa']], function () {
            Server::add(abc::class);
        });
        $arr = ['i' => uniqid(), 'c' => abc::class, 'f' => 'func', 't' => ['a']];
        echo Server::call($arr);
    }
}
