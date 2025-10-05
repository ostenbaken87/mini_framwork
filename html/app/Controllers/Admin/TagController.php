<?php

namespace App\Controllers\Admin;

use App\View\View;
use App\Db\Db;
use App\Repository\Tag\TagRepository;
use App\Service\Tag\TagService;

class TagController
{
    private TagService $service;

    public function __construct()
    {
        $pdo = Db::getInstance()->getConnection();
        $repository = new TagRepository($pdo);
        $this->service = new TagService($repository);
    }

    public function index(): bool|string
    {
        $title = 'Теги';
        $tags = $this->service->getAllTags();
        return View::render('admin/tags/index',["title" => $title, "tags" => $tags]);
    }

    public function create(): bool|string
    {
        $title = 'Создать тег';
        return View::render('admin/tags/create',["title" => $title]);
    }

    public function store(): void
    {
        $data = [
            'name' => $_POST['name'] ?? ''
        ];
        $this->service->createTag($data);
        header('Location: /admin/tags');
        exit;
    }

    public function edit(string $id): bool|string
    {
        $title = 'Редактировать тег';
        $tag = $this->service->getTag((int)$id);
        return View::render('admin/tags/edit',["title" => $title, "tag" => $tag]);
    }

    public function update(string $id): void
    {
        $data = [
            'name' => $_POST['name'] ?? ''
        ];
        $this->service->updateTag((int)$id, $data);
        header('Location: /admin/tags');
        exit;
    }

    public function destroy(string $id): void
    {
        $this->service->deleteTag((int)$id);
        header('Location: /admin/tags');
        exit;
    }
}