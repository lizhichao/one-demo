<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/14
 * Time: 10:32
 */

namespace App\Test\MixPro;



use One\Swoole\Response;
use One\Swoole\Server;

class TestMiddle
{
    public function checkSession($next, Response $response)
    {
        $name = $response->session()->get('name');
        $code = $response->session()->get('code');
        $req = $response->getHttpRequest();
        if (!$name && ($req->get('code') != $code || !$code)) {
            return '<a href="/">go login in</a>';
        }
        if ($code) {
            $response->session()->del('code'); //只用一次
        }
        return $next();
    }

    public function isLogin($next, Response $response, Server $server)
    {
        $name = $response->session()->get('name');
        if($name){
            if($server->get("http.{$name}")){
                return $response->redirect('/mix/http');
            }else{
                return $response->redirect('/mix/ws');
            }
        }
        return $next();
    }
}
