<?php

namespace App\Controllers;

use One\Http\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return 'hello world';
    }

    public function home()
    {
        echo router('user', ['id' => 100]);
    }

    public function user($id)
    {
        echo $id;
    }

    public function aa($name)
    {
        return $name;
    }

    public function zz($aa)
    {
        return $aa;
    }
}




