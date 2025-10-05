<?php

declare(strict_types= 1);

namespace App\Controllers\Admin;

use App\Db\Db;
use App\View\View;
use App\Service\Tag\TagService;
use App\Repository\Tag\TagRepository;
use App\Service\Category\CategoryService;
use App\Repository\Category\CategoryRepository;

class AdminController
{
    private TagService $serviceTag;
    private CategoryService $categoryService;

    public function __construct()
    {
        $pdo = Db::getInstance()->getConnection();
        $repositoryTag = new TagRepository($pdo);
        $this->serviceTag = new TagService($repositoryTag);
        $repositoryCategory = new CategoryRepository($pdo);
        $this->categoryService = new CategoryService($repositoryCategory);
    }

    public function index(): bool|string
    {
        $title = 'Дашборд';
        $tags = $this->serviceTag->getAllTags();
        $categories = $this->categoryService->getAllCategories();
        return View::render('admin/main',['title' => $title, 'tags' => $tags, 'categories' => $categories]);
    }
}