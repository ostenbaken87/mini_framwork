<?php

declare(strict_types=1);

namespace App\Container;

use App\Db\Db;
use App\Repository\Article\ArticleRepository;
use App\Repository\Article\ArticleRepositoryInterface;
use App\Repository\Category\CategoryRepository;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Tag\TagRepository;
use App\Repository\Tag\TagRepositoryInterface;
use App\Service\Article\ArticleService;
use App\Service\Article\ArticleServiceInterface;
use App\Service\Category\CategoryService;
use App\Service\Category\CategoryServiceInterface;
use App\Service\Tag\TagService;
use App\Service\Tag\TagServiceInterface;

class Container
{
    private array $services = [];
    private ?\PDO $pdo = null;

    public function get(string $id): mixed
    {
        if (isset($this->services[$id])) {
            return $this->services[$id];
        }

        return $this->create($id);
    }

    private function create(string $id): mixed
    {
        return match ($id) {
            'pdo' => $this->getPdo(),
            'tag.repository' => new TagRepository($this->get('pdo')),
            'tag.service' => new TagService($this->get('tag.repository')),
            'category.repository' => new CategoryRepository($this->get('pdo')),
            'category.service' => new CategoryService($this->get('category.repository')),
            'article.repository' => new ArticleRepository($this->get('pdo')),
            'article.service' => new ArticleService($this->get('article.repository')),
            default => throw new \InvalidArgumentException("Service '{$id}' not found")
        };
    }

    private function getPdo(): \PDO
    {
        if ($this->pdo === null) {
            $this->pdo = Db::getInstance()->getConnection();
        }
        return $this->pdo;
    }

    // Convenience methods for type safety
    public function getTagService(): TagServiceInterface
    {
        return $this->get('tag.service');
    }

    public function getCategoryService(): CategoryServiceInterface
    {
        return $this->get('category.service');
    }

    public function getArticleService(): ArticleServiceInterface
    {
        return $this->get('article.service');
    }
}
