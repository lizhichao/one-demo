<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 11:43
 */

namespace App\Test\WebSocket;

use One\Swoole\WsController;

class TestController extends WsController
{
    public function abc()
    {
        $this->server->push($this->frame->fd, __METHOD__ . ' - ' . $this->frame->data);
    }

    public function bbb()
    {
        $this->server->push($this->frame->fd, __METHOD__ . ' - ' . $this->frame->data);
    }
}