<?php

namespace App\View;

use Exception;

class View
{
    public static function render($view, $data = []): bool|string
    {
        try {
            extract($data);
            $path = VIEWS . "/$view.view.php";

            if (!is_file($path)) {
                http_response_code(404);
                ob_start();
                include VIEWS . "/errors/404.view.php";
                return ob_get_clean();
            }

            ob_start();
            include $path;
            return ob_get_clean();
        } catch (Exception $e) {
            throw new Exception("Error rendering view: " . $e->getMessage());
        }
    }
}