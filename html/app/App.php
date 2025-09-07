<?php

namespace App;

use App\Router\Router;

class App
{
    public static function run()
    {
        $router = new Router();
        $router->run();
    }
}