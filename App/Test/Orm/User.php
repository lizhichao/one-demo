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
    CONST TABLE = 'users';

    /**
     * @var int 设置缓存时间0 也就是禁止缓存
     */
    protected $_cache_time = 0;

    protected $_connection = 'test';

    /**
     * 设置关系 用户的文章
     * @return Model
     */
    public function articles()
    {
        return $this->hasMany('id', Article::class, 'user_id');

//        状态为 1 的文章
//        return $this->hasMany('id', Article::class, 'user_id')->where('status', 1);
    }
}