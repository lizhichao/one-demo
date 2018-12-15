<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/12
 * Time: 10:55
 */

namespace App\Test\MixPro;


trait Funs
{
    protected function sendTo($n, $d)
    {
        if ($n == 'all') {
            $arr = $this->global_data->get('http');
            if ($arr) {
                foreach ($arr as $name => $v) {
                    $this->global_data->set("data.{$name}.", $d, time() + 60);
                }
            }
            $arr = $this->global_data->get('fd-name');
            if (!$arr) {
                return false;
            }
            foreach ($arr as $fd => $v) {
                $info = $this->getClientInfo($fd);
                if (isset($info['websocket_status'])) {
                    $this->push($fd, $d);
                } else if ($info) {
                    $this->sendToTcp($fd, $d);
                } else {
                    $this->global_data->unBindFd($fd);
                }
            }
        } else if ($this->global_data->get("http.{$n}")) { // http 用户
            $this->global_data->set("data.{$n}.", $d, time() + 60);
        } else {
            $fds = $this->global_data->getFdByName($n);
            if (!$fds) {
                return false;
            }
            foreach ($fds as $fd) {
                $info = $this->getClientInfo($fd);
                if (isset($info['websocket_status'])) {
                    $this->push($fd, $d);
                } else if ($info) {
                    $this->sendToTcp($fd, $d);
                }
            }

        }
    }


    protected function sendToTcp($fd, $str)
    {
        $arr = json_decode($str, true);
        if ($arr['v'] == 1) {
            $this->send($fd, "用户加入:{$arr['n']}\n");
        } else if ($arr['v'] == 2) {
            $this->send($fd, "用户退出:{$arr['n']}\n");
        } else if ($arr['v'] == 3) {
            $this->send($fd, "收到消息:{$arr['n']}\n");
        } else if ($arr['v'] == 4) {
            $str = '';
            foreach ($arr['n'] as $n => $v) {
                $str .= "\t{$n}\n";
            }
            $this->send($fd, "当前在线用户:\n{$str}");
        }
    }

    protected function getAllName()
    {
        $arr = $this->global_data->get('http');
        $r   = [];
        if ($arr) {
            foreach ($arr as $name => $v) {
                $r[$name] = 1;
            }
        }
        $arr = $this->global_data->get('name-fd');
        if ($arr) {
            foreach ($arr as $name => $v) {
                $r[$name] = 2;
            }
        }
        return $r;
    }
}