<?php

namespace App\View;

use Exception;

class View
{
    public static function render($view, $data = []): bool|string
    {
        try {
            extract($data);
            ob_start();
            include VIEWS . "/$view.view.php";
            return ob_get_clean();
        } catch (Exception $e) {
            throw new Exception("Error rendering view: " . $e->getMessage());
        }
    }
}