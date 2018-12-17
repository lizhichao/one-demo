<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/17
 * Time: 10:21
 */

namespace App\Test\Rpc;


use App\Client\RpcTcp;

class ClientAbc extends RpcTcp
{
//    在配置文件 config/client.php
//    protected $_rpc_server = 'tcp://127.0.0.1:8083/';

    protected $_remote_class_name = Abc::class;

    protected $_token = '123';

}