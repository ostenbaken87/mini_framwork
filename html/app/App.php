<?php

namespace App;

use Exception;
use App\Router\Router;

class App
{
    public static function run()
    {
        try {
            $router = new Router();
            $router->run();
        } catch (Exception $e) {
            throw new Exception("Error running app: " . $e->getMessage());
        }
    }
}