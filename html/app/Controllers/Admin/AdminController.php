<?php

namespace App\Controllers\Admin;

use App\View\View;

class AdminController
{
    public function index(): bool|string
    {
        $title = 'Дашборд';
        return View::render('admin/main',['title' => $title]);
    }
}