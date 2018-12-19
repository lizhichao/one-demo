<?php

namespace App\Controllers;

use App\GlobalData\Client;
use App\Test\Rpc\ClientAbc;
use One\Http\Controller;

class IndexController extends Controller
{
    private static $client = null;

    public function index()
    {
        return 'hello world';
    }

    public function rpc()
    {
        $a = new ClientAbc(5);
        return $a->add(2, 5);
    }

    public function data()
    {
        if (self::$client === null) {
            self::$client = new Client();
        }

        $r = self::$client->incr('asdf', 1);

        return $r;
    }
}




