<?php

namespace App\Controllers;

use App\Test\Orm\User;
use One\Http\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $r = User::limit(10)->findAll()->toArray();
        print_r($r);
        return 1;
    }
}
