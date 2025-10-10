<?php

namespace App\Service\Article;

interface ArticleServiceInterface
{
    public function list(): array;
    public function get(int $id): ?array;
    public function create(array $data): array;
    public function update(int $id, array $data): array;
    public function delete(int $id): bool;
    public function getFormData(?int $articleId = null): array; // categories, tags, selected tag ids
}


