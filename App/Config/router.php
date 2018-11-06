<?php

use One\Http\Router;
Router::get('/', \App\Controllers\IndexController::class . '@index');

