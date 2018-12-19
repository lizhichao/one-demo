<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/7
 * Time: 14:15
 */

namespace App\Test\Orm;


use One\Database\Mysql\Model;

class Comment extends Model
{
    CONST TABLE = 'comments';

    // 根据 article_id 细化缓存的刷新粒度
    protected $_cache_key_column = ['article_id'];

    protected $_connection = 'test';
}