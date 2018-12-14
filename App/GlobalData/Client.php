<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/10/12
 * Time: 下午9:55
 */

namespace App\GlobalData;

use One\Swoole\Client\Tcp;

/**
 * Class Client
 * @package App\GlobalData
 * @mixin Data
 */
class Client
{
    private $client;

    public function __construct()
    {
        $this->client = new Tcp('global_data');
    }

    public function __call($name, $arguments)
    {
        $cli  = $this->client->pop();
        $data = msgpack_pack(['m' => $name, 'args' => $arguments]);
        $r    = $this->client->sendRs($cli, $data);
        if ($r === false) {
            $retry = 0;
            do {
                $this->client->del();
                $cli = $this->client->pop();
                $this->client->sendRs($cli, $data);
            } while ($retry < 5 || $r === false);
        }
        $ret = msgpack_unpack($this->client->recvRs($cli));
        $this->client->push($cli);
        return $ret;
    }
}