<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/3/21
 * Time: 14:00
 */

namespace App\Test\Model;

class Tag extends Base
{
    const TABLE = 'tags';

    public function target_rel()
    {
        return $this->hasMany('id', TargetTag::class, 'tag_id');
    }

    public function __destruct()
    {
        echo __CLASS__ . "\n";
    }
}