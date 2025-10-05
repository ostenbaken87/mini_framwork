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
    // Category CRUD
    Route::get("/admin/categories", "Admin\CategoryController", "index"),
    Route::get("/admin/categories/create", "Admin\CategoryController", "create"),
    Route::post("/admin/categories", "Admin\CategoryController", "store"),
    Route::get("/admin/categories/{id:\\d+}/edit", "Admin\CategoryController", "edit"),
    Route::post("/admin/categories/{id:\\d+}", "Admin\CategoryController", "update"),
    Route::post("/admin/categories/{id:\\d+}/delete", "Admin\CategoryController", "destroy"),
    // Article CRUD
    Route::get("/admin/articles", "Admin\ArticleController", "index"),
    Route::get("/admin/articles/create", "Admin\ArticleController", "create"),
    Route::post("/admin/articles", "Admin\ArticleController", "store"),
    Route::get("/admin/articles/{id:\\d+}/edit", "Admin\ArticleController", "edit"),
    Route::post("/admin/articles/{id:\\d+}", "Admin\ArticleController", "update"),
    Route::post("/admin/articles/{id:\\d+}/delete", "Admin\ArticleController", "destroy"),
];