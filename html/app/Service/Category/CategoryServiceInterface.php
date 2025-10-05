<?php

namespace App\Service\Category;

interface CategoryServiceInterface
{
    public function getAllCategories(): array;
    public function getCategory(int $id): ?array;
    public function createCategory(array $data): array;
    public function updateCategory(int $id, array $data): array;
    public function deleteCategory(int $id): bool;
    public function validateCategoryData(array $data): array;
}