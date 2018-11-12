<?php
/**
 * Created by PhpStorm.
 * User: tanszhe
 * Date: 2018/10/12
 * Time: 下午9:55
 */

namespace App\Client;


use One\Swoole\AsyncClient;
use One\Swoole\GlobalData;

class GlobalDataClient extends AsyncClient
{

    private $global;

    public function __construct(\swoole_client $cli, array $conf)
    {
        parent::__construct($cli, $conf);
        $this->global = new GlobalData();
    }

    public function onReceive(\swoole_client $cli, $data)
    {
        echo 'receive:' . $data . PHP_EOL;
    }

    public function __call($name, $arguments)
    {
        if ($this->connected === 1 && method_exists($this->global, $name)) {
            $data = serialize(['m' => $name, 'args' => $arguments]);
            $this->send($data);
            if (strpos($name, 'get') !== false) {
                return unserialize($this->protocol::decode($this->cli->recv()));
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }
}