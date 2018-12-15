<?php

namespace App\Exceptions;

use One\Exceptions\HttpException;
use One\Facades\Log;

class Handler
{
    public static function render(HttpException $e)
    {
        $e->response->code($e->getCode());

        if ($e->response->getHttpRequest()->isJson()) {
            return $e->response->json(format_json($e->getMessage(), $e->getCode(), $e->response->getHttpRequest()->id()));
        } else {
            $file = _APP_PATH_VIEW_ . '/Exceptions/' . $e->getCode() . '.php';
            if (file_exists($file)) {
                return $e->response->tpl('Exceptions/' . $e->getCode(), ['e' => $e]);
            } else {
                return $e->response->json(format_json($e->getMessage(), $e->getCode(), $e->response->getHttpRequest()->id()));
            }
        }
    }

    public static function report(\Throwable $e)
    {
        Log::error([
            'file' => $e->getFile().':'.$e->getLine(),
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
            'trace' => $e->getTrace()
        ]);
    }

}

