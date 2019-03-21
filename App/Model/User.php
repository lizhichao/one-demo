<?php

namespace App\Model;

use One\Database\Mysql\Model;

class User extends Model
{
    protected $_cache_time = 0;

    CONST TABLE = 'users';
}