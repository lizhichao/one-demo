<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:43
 */

namespace App\Test\Websocket;

use One\Swoole\WsController;

class TestController extends WsController
{
    public function abc()
    {
        $this->server->push($this->frame->fd,__METHOD__.$this->frame->data);

    }

    public function bbb()
    {
        $time = microtime(true);
        for($i=0;$i<10000;$i++){
            $this->uuid();
        }
        echo microtime(true) - $time .PHP_EOL;
        $time = microtime(true);
        for($i=0;$i<10000;$i++){
            uuid();
        }
        echo microtime(true) - $time .PHP_EOL;
//        $this->server->push($this->frame->fd,__METHOD__.$this->frame->data);
    }

    public function uuid($base62 = true)
    {
        $str = uniqid('', true);
        $arr = explode('.', $str);
        $str = $arr[0] . base_convert($arr[1], 10, 16);
        $len = 32;
        while (strlen($str) <= $len) {
            $str .= bin2hex(random_bytes(4));
        }
        $str = substr($str, 0, $len);
        if($base62){
            $str = str_replace(['+','/','='],'',base64_encode(hex2bin($str)));
        }
        return $str;
    }
}