<?php

namespace App\Controllers;

use One\Http\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->response->write('hello');
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




