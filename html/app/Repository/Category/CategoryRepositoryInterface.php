<?php

namespace App\Repository\Category;

interface CategoryRepositoryInterface
{
    public function getAllCategories(): array;
    public function getCategoryById(int $id): ?array;
    public function createCategory(array $data): int;
    public function updateCategory(int $id, array $data): bool;
    public function deleteCategory(int $id): bool;
    public function categoryExists(int $id): bool;
}