<?php

declare(strict_types= 1);

namespace App\Controllers\Admin;

use App\View\View;
use App\Db\Db;
use App\Repository\Category\CategoryRepository;
use App\Service\Category\CategoryService;

class CategoryController
{
    private CategoryService $service;

    public function __construct()
    {
        $pdo = Db::getInstance()->getConnection();
        $repository = new CategoryRepository($pdo);
        $this->service = new CategoryService($repository);
    }

    public function index(): bool|string
    {
        $title = 'Категории';
        $categories = $this->service->getAllCategories();
        return View::render('admin/categories/index',["title" => $title, "categories" => $categories]);
    }

    public function create(): bool|string
    {
        $title = 'Создать категорию';
        return View::render('admin/categories/create',["title" => $title]);
    }
    
    public function store(): void
    {
        $data = [
            'name' => $_POST['name'] ?? ''
        ];
        $this->service->createCategory($data);
        header('Location: /admin/categories');
        exit;
    }

    public function edit(string $id): bool|string
    {
        $title = 'Редактировать категорию';
        $category = $this->service->getCategory((int)$id);
        return View::render('admin/categories/edit',["title" => $title, "category" => $category]);
    }
    
    public function update(string $id): void
    {
        $data = [
            'name' => $_POST['name'] ?? ''
        ];
        $this->service->updateCategory((int)$id, $data);
        header('Location: /admin/categories');
        exit;
    }

    public function destroy(string $id): void
    {
        $this->service->deleteCategory((int)$id);
        header('Location: /admin/categories');
        exit;
    }
}