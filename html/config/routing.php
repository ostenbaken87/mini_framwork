<?php

use App\Route\Route;

return [
    Route::get("/", "HomeController", "index"),

    //Admin routes
    Route::get("/admin", "Admin\AdminController", "index"),
    // Tag CRUD
    Route::get("/admin/tags", "Admin\TagController", "index"),
    Route::get("/admin/tags/create", "Admin\TagController", "create"),
    Route::post("/admin/tags", "Admin\TagController", "store"),
    Route::get("/admin/tags/{id:\\d+}/edit", "Admin\TagController", "edit"),
    Route::post("/admin/tags/{id:\\d+}", "Admin\TagController", "update"),
    Route::post("/admin/tags/{id:\\d+}/delete", "Admin\TagController", "destroy"),
];