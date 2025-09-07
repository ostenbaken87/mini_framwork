<?php

namespace App\View;

class View
{
    public static function render($view, $data = []): bool|string
    {
        extract($data);
        ob_start();
        include VIEWS . "/$view.view.php";
        return ob_get_clean();
    }
}