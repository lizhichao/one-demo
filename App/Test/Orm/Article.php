<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/7
 * Time: 14:15
 */

namespace App\Test\Orm;


use One\Database\Mysql\Model;

class Article extends Model
{
    CONST TABLE = 'articles';

    // 文章浏览数量 更新时不刷新缓存
    protected $_ignore_flush_cache_column = ['read_count'];

    protected $_connection = 'test';
}