<?php

namespace App\Controllers;

use One\Facades\Log;
use One\Http\Controller;

class IndexController extends Controller
{
    public function index()
    {
        Log::debug('abc');
        Log::debug(['12,312']);
        return __FILE__;
    }



}
