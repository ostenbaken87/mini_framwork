<?php

namespace App\Traits;

trait Helpers
{
    public function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    public function error($code)
    {
        http_response_code($code);
        require VIEWS . "/errors/{$code}.view.php";
        die();
    }
}