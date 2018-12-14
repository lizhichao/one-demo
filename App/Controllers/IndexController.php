<?php

namespace App\Controllers;

use App\GlobalData\Client;
use One\Http\Controller;

class IndexController extends Controller
{
    /**
     * @var Client|null
     */
    public static $client = null;

    public function __construct($request, $response, $server = null)
    {
        parent::__construct($request, $response, $server);
        if(self::$client === null){
            self::$client = new Client();
        }
    }

    public function index()
    {
        $a = self::$client->incr('a',1);
        return $a;
    }

    public function home()
    {
        echo router('user', ['id' => 100]);
    }

    public function user($id)
    {
        echo $id;
    }

    public function aa($name)
    {
        return $name;
    }

    public function zz($aa)
    {
        return $aa;
    }
}




