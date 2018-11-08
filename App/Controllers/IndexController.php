<?php

namespace App\Controllers;

use One\Facades\Cache;
use One\Http\Controller;

class IndexController extends Controller
{
    public function index()
    {
        Cache::set('a',1);
        return 'Hello World';
    }

}
