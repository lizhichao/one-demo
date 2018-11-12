<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/12
 * Time: 10:48
 */

namespace App\Test\MixPro;


use One\Swoole\Server;

class Tcp extends Server
{
    use Funs;

    private $users = [];

    public function onConnect(\swoole_server $server, $fd, $reactor_id)
    {
        $name             = uuid();
        $this->users[$fd] = $name;
        $this->sendTo('all', json_encode(['v' => 1, 'n' => $name]));
        $this->send($fd, json_encode(['v' => 4, 'n' => $this->getAllName()]));
        $this->bindName($fd, $name);
        $this->send($fd, 'you name  = ' . $name);
    }

    public function onReceive(\swoole_server $server, $fd, $reactor_id, $data)
    {
        $arr = explode(' ',$data);
        if(count($arr) !== 3 || $arr[0] !== 'send'){
            $this->send($fd,"格式不正确\n");
            return false;
        }
        $n = $arr[1];
        $d = $arr[2];
        $this->sendTo($n,json_encode(['v' => 3,'n' => $d]));
    }

    public function onClose(\swoole_server $server, $fd, $reactor_id)
    {
        parent::onClose($server, $fd, $reactor_id);
        $this->sendTo('all', json_encode(['v' => 2, 'n' => $this->names[$fd]]) . "\n");
        unset($this->users[$fd]);
    }

}