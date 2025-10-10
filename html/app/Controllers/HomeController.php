<?php

namespace App\Controllers;

use App\View\View;

class HomeController
{
    public function index(): string
    {
        $title = "Главная страница";
        return View::render('layouts/app', ['title' => $title]);
    }
}