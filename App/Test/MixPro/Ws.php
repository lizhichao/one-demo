<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/12
 * Time: 10:42
 */

namespace App\Test\MixPro;

use App\GlobalData\Client;
use One\Swoole\Server\WsServer;

class Ws extends WsServer
{
    use Funs;

    private $users = [];

    /**
     * @var Client
     */
    public $global_data = null;

    public function __construct(\swoole_server $server, array $conf)
    {
        parent::__construct($server, $conf);
        $this->global_data = new Client();
    }

    public function onHandShake(\swoole_http_request $request, \swoole_http_response $response)
    {
        return parent::onHandShake($request, $response);
    }

    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $data = $frame->data;
        $arr  = json_decode($data, true);
        $n    = $arr['n'];
        $d    = $arr['d'];
        $this->sendTo($n, json_encode(['v' => 3, 'n' => $d]));

    }

    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request)
    {
        $name = $this->session[$request->fd]->get('name');
        if ($name) {
            $this->users[$request->fd] = $name;
            $this->sendTo('all', json_encode(['v' => 1, 'n' => $name]));
            $this->global_data->bindName($request->fd, $name);
            return true;
        } else {
            return false;
        }
    }

    public function onClose(\swoole_server $server, $fd, $reactor_id)
    {
        echo "ws close {$fd} \n";
        $this->global_data->unBindFd($fd);
        $this->sendTo('all', json_encode(['v' => 2, 'n' => $this->users[$fd]]));
        unset($this->users[$fd]);
    }
}