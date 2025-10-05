<?php

namespace App\Controllers\Admin;

use App\View\View;
use App\Db\Db;
use App\Repository\Article\ArticleRepository;
use App\Service\Article\ArticleService;

class ArticleController
{
    private ArticleService $service;

    public function __construct()
    {
        $pdo = Db::getInstance()->getConnection();
        $repository = new ArticleRepository($pdo);
        $this->service = new ArticleService($repository);
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
        return View::render('admin/articles/create', compact('title') + $form);
    }

    public function store(): void
    {
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
    }

    public function edit(string $id): bool|string
    {
        $title = 'Редактировать статью';
        $article = $this->service->get((int)$id);
        $form = $this->service->getFormData((int)$id);
        return View::render('admin/articles/edit', compact('title', 'article') + $form);
    }

    public function update(string $id): void
    {
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
    }

    public function destroy(string $id): void
    {
        $this->service->delete((int)$id);
        header('Location: /admin/articles');
        exit;
    }
}


