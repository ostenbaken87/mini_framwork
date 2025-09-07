<?php

use App\Route\Route;

return [
    Route::get("/", "HomeController", "index"),


    Route::get("/admin", "Admin\AdminController", "index"),
];