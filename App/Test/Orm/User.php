<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/7
 * Time: 14:15
 */

namespace App\Test\Orm;


use One\Database\Mysql\Model;

class User extends Model
{
    CONST TABLE = 'abc';

    /**
     * 禁止缓存
     * @var int
     */
    protected $_cache_time = 0;

    protected $_connection = 'test';
}