<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\View\View;
use App\Service\Article\ArticleServiceInterface;
use App\Traits\CsrfHelper;
use App\Container\AppContainer;

class ArticleController
{
    use CsrfHelper;
    
    private ArticleServiceInterface $service;

    public function __construct()
    {
        $this->service = AppContainer::getArticleService();
    }

    public function index(): bool|string
    {
        $title = 'Статьи';
        $articles = $this->service->list();
        return View::render('admin/articles/index', compact('title', 'articles'));
    }

    public function create(): bool|string
    {
        $title = 'Создать статью';
        $form = $this->service->getFormData();
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        return View::render('admin/articles/create', compact('title', 'errors') + $form);
    }

    public function store(): void
    {
        if (!$this->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/articles/create');
            exit;
        }
        
        try {
            $data = [
                'title' => $_POST['title'] ?? '',
                'category_id' => $_POST['category_id'] ?? null,
                'content' => $_POST['content'] ?? '',
                'status' => $_POST['status'] ?? 'draft',
                'tag_ids' => $_POST['tag_ids'] ?? [],
            ];
            $this->service->create($data);
            header('Location: /admin/articles');
            exit;
        } catch (\InvalidArgumentException $e) {
            $errors = json_decode($e->getMessage(), true) ?: ['general' => 'Validation error'];
            $_SESSION['errors'] = $errors;
            header('Location: /admin/articles/create');
            exit;
        }
    }

    public function edit(string $id): bool|string
    {
        $title = 'Редактировать статью';
        $article = $this->service->get((int)$id);
        $form = $this->service->getFormData((int)$id);
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        return View::render('admin/articles/edit', compact('title', 'article', 'errors') + $form);
    }

    public function update(string $id): void
    {
        if (!$this->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/articles/' . $id . '/edit');
            exit;
        }
        
        try {
            $data = [
                'title' => $_POST['title'] ?? '',
                'category_id' => $_POST['category_id'] ?? null,
                'content' => $_POST['content'] ?? '',
                'status' => $_POST['status'] ?? 'draft',
                'tag_ids' => $_POST['tag_ids'] ?? [],
            ];
            $this->service->update((int)$id, $data);
            header('Location: /admin/articles');
            exit;
        } catch (\InvalidArgumentException $e) {
            $errors = json_decode($e->getMessage(), true) ?: ['general' => 'Validation error'];
            $_SESSION['errors'] = $errors;
            header('Location: /admin/articles/' . $id . '/edit');
            exit;
        }
    }

    public function destroy(string $id): void
    {
        if (!$this->validateCsrfToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/articles');
            exit;
        }
        
        $this->service->delete((int)$id);
        header('Location: /admin/articles');
        exit;
    }
}


