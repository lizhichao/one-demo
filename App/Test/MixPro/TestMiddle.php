<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/14
 * Time: 10:32
 */

namespace App\Test\MixPro;

use One\Swoole\Response;

class TestMiddle
{
    public function checkSession($next, Response $response)
    {
        $name = $response->session()->get('name');
        $code = $response->session()->get('code');
        $req = $response->getHttpRequest();
        if (!$name && ($req->get('code') != $code || !$code)) {
            return '<a href="/mix">go login in</a>';
        }
        if ($code) {
            $response->session()->del('code'); //只用一次
        }
        return $next();
    }

    /**
     * @param $next
     * @param Response $response
     * @param Ws $server
     * @return string
     */
    public function isLogin($next, Response $response, $server)
    {
        $name = $response->session()->get('name');
        if($name){
            if($server->global_data->get("http.{$name}")){
                return $response->redirect('/mix/http');
            }else{
                return $response->redirect('/mix/ws');
            }
        }
        return $next();
    }
}
