<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/7
 * Time: 14:15
 */

namespace App\Test\Orm;


use One\Database\Mysql\Model;

class ArticleTag extends Model
{
    CONST TABLE = 'article_tag';

    protected $_connection = 'test';
}