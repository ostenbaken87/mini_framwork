<?php

namespace App\Service\Category;

use InvalidArgumentException;
use App\Repository\Category\CategoryRepositoryInterface;

class CategoryService implements CategoryServiceInterface
{
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function getAllCategories(): array
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategory(int $id): ?array
    {
        if(!$this->categoryRepository->categoryExists($id)){
            throw new InvalidArgumentException("Category with ID $id not found");
        }
        return $this->categoryRepository->getCategoryById($id);
    }

    public function createCategory(array $data): array
    {
        $errors = $this->validateCategoryData($data);
        if (!empty($errors)) {
            throw new InvalidArgumentException(json_encode($errors));
        }
        $categoryId = $this->categoryRepository->createCategory($data);
        return $this->getCategory($categoryId);
    }

    public function updateCategory(int $id, array $data): array
    {
        if(!$this->categoryRepository->categoryExists($id)){
            throw new InvalidArgumentException("Category with ID $id not found");
        }
        $errors = $this->validateCategoryData($data);

        if (!empty($errors)) {
            throw new InvalidArgumentException(json_encode($errors));
        }

        $this->categoryRepository->updateCategory($id, $data);
        return $this->getCategory($id);
    }

    public function deleteCategory(int $id): bool
    {
        if(!$this->categoryRepository->categoryExists($id)){
            throw new InvalidArgumentException("Category with ID $id not found");
        }
        return $this->categoryRepository->deleteCategory($id);
    }

    public function validateCategoryData(array $data): array
    {
        $errors = [];
        if (empty($data['name'])) {
            $errors['name'] = 'Category name is required';
        } elseif (strlen($data['name']) < 2) {
            $errors['name'] = 'Category name must be at least 2 characters';
        } elseif (strlen($data['name']) > 50) {
            $errors['name'] = 'Category name must not exceed 50 characters';
        }
        return $errors;
    }
}