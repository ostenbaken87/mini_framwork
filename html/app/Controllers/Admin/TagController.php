<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\View\View;
use App\Service\Tag\TagServiceInterface;
use App\Traits\CsrfHelper;
use App\Helpers\CsrfHelper as CsrfHelperStatic;
use App\Container\AppContainer;

class TagController
{
    use CsrfHelper;
    
    private TagServiceInterface $service;

    public function __construct()
    {
        $this->service = AppContainer::getTagService();
    }

    public function index(): string
    {
        $title = 'Теги';
        $tags = $this->service->getAllTags();
        return View::render('admin/tags/index',["title" => $title, "tags" => $tags]);
    }

    public function create(): string
    {
        $title = 'Создать тег';
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        return View::render('admin/tags/create',["title" => $title, "errors" => $errors]);
    }

    public function store(): void
    {
        if (!CsrfHelperStatic::validateToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/tags/create');
            exit;
        }
        
        try {
            $data = [
                'name' => $_POST['name'] ?? ''
            ];
            $this->service->createTag($data);
            header('Location: /admin/tags');
            exit;
        } catch (\InvalidArgumentException $e) {
            $errors = json_decode($e->getMessage(), true) ?: ['name' => 'Validation error'];
            $_SESSION['errors'] = $errors;
            header('Location: /admin/tags/create');
            exit;
        }
    }

    public function edit(string $id): string
    {
        $title = 'Редактировать тег';
        $tag = $this->service->getTag((int)$id);
        $errors = $_SESSION['errors'] ?? [];
        unset($_SESSION['errors']);
        return View::render('admin/tags/edit',["title" => $title, "tag" => $tag, "errors" => $errors]);
    }

    public function update(string $id): void
    {
        if (!CsrfHelperStatic::validateToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/tags/' . $id . '/edit');
            exit;
        }
        
        try {
            $data = [
                'name' => $_POST['name'] ?? ''
            ];
            $this->service->updateTag((int)$id, $data);
            header('Location: /admin/tags');
            exit;
        } catch (\InvalidArgumentException $e) {
            $errors = json_decode($e->getMessage(), true) ?: ['name' => 'Validation error'];
            $_SESSION['errors'] = $errors;
            header('Location: /admin/tags/' . $id . '/edit');
            exit;
        }
    }

    public function destroy(string $id): void
    {
        if (!CsrfHelperStatic::validateToken($_POST['csrf_token'] ?? '')) {
            $_SESSION['errors'] = ['csrf' => 'Invalid CSRF token'];
            header('Location: /admin/tags');
            exit;
        }
        
        $this->service->deleteTag((int)$id);
        header('Location: /admin/tags');
        exit;
    }
}