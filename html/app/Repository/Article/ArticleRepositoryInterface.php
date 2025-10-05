<?php

namespace App\Repository\Article;

interface ArticleRepositoryInterface
{
    public function getAll(): array;
    public function findById(int $id): ?array;
    public function create(array $data, array $tagIds): int;
    public function update(int $id, array $data, array $tagIds): bool;
    public function delete(int $id): bool;
    public function getAllCategories(): array;
    public function getAllTags(): array;
    public function getArticleTagIds(int $articleId): array;
}


