<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\View\View;
use App\Service\Category\CategoryServiceInterface;
use App\Traits\CsrfHelper;
use App\Helpers\CsrfHelper as CsrfHelperStatic;
use App\Container\AppContainer;

class CategoryController
{
    use CsrfHelper;
    
    private CategoryServiceInterface $service;

    public function __construct()
    {
        $this->service = AppContainer::getCategoryService();
    }

    public function index(): string
    {
        $title = 'Категории';
        $categories = $this->service->getAllCategories();
        return View::render('admin/categories/index',["title" => $title, "categories" => $categories]);
    }

    public function create(): string
    {
        $title = 'Создать категорию';
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        return View::render('admin/categories/create',["title" => $title, "errors" => $errors]);
    }
    
    public function store(): void
    {
        if (!CsrfHelperStatic::validateToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/categories/create');
            exit;
        }
        
        try {
            $data = [
                'name' => $_POST['name'] ?? ''
            ];
            $this->service->createCategory($data);
            header('Location: /admin/categories');
            exit;
        } catch (\InvalidArgumentException $e) {
            $errors = json_decode($e->getMessage(), true) ?: ['name' => 'Validation error'];
            $_SESSION['errors'] = $errors;
            header('Location: /admin/categories/create');
            exit;
        }
    }

    public function edit(string $id): string
    {
        $title = 'Редактировать категорию';
        $category = $this->service->getCategory((int)$id);
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        return View::render('admin/categories/edit',["title" => $title, "category" => $category, "errors" => $errors]);
    }
    
    public function update(string $id): void
    {
        if (!CsrfHelperStatic::validateToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/categories/' . $id . '/edit');
            exit;
        }
        
        try {
            $data = [
                'name' => $_POST['name'] ?? ''
            ];
            $this->service->updateCategory((int)$id, $data);
            header('Location: /admin/categories');
            exit;
        } catch (\InvalidArgumentException $e) {
            $errors = json_decode($e->getMessage(), true) ?: ['name' => 'Validation error'];
            $_SESSION['errors'] = $errors;
            header('Location: /admin/categories/' . $id . '/edit');
            exit;
        }
    }

    public function destroy(string $id): void
    {
        if (!CsrfHelperStatic::validateToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/categories');
            exit;
        }
        
        $this->service->deleteCategory((int)$id);
        header('Location: /admin/categories');
        exit;
    }
}