<?php

namespace App\Controllers\Admin;

use App\View\View;

class AdminController
{
    public function index()
    {
        return View::render('admin/main');
    }
}