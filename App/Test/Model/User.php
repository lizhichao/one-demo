<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/3/21
 * Time: 13:59
 */

namespace App\Test\Model;


class User extends Base
{
    const TABLE = 'users';

    public function article_n()
    {
        return $this->hasMany('id', Article::class, 'user_id');
    }

    public function comment_n()
    {
        return $this->hasMany('id', Comment::class, 'user_id');
    }

    public function article()
    {
        return $this->hasMany('id', Article::class, 'user_id')->where('status', 1);
    }

    public function comments()
    {
        return $this->hasMany('id', Comment::class, 'user_id')->where('target_type', 1);
    }

}