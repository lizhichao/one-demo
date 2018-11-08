<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/8
 * Time: 16:41
 */

namespace App\Test;


use One\Http\Controller;

class HttpController extends Controller
{
    public function ws()
    {
        return $this->display('ws');
    }
}