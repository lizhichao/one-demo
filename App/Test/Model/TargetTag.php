<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/3/21
 * Time: 14:02
 */

namespace App\Test\Model;


class TargetTag extends Base
{
    const TABLE = 'target_tag';

    public function target()
    {
        return $this->morphOne([
            1 => Article::class,
            2 => Video::class
        ], [
            1 => 'id',
            2 => 'vid'
        ], 'target_type', 'target_id');
    }

}

