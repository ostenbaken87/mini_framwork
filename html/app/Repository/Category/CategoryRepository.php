<?php

namespace App\Repository\Category;

use PDO;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function getAllCategories(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function createCategory(array $data): int
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO categories (name, created_at) 
            VALUES (:name, NOW())"
        );
        $stmt->execute([
            'name' => $data['name'],
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    public function updateCategory(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare(
            "UPDATE categories SET name = :name, updated_at = NOW() 
            WHERE id = :id"
        );
        return $stmt->execute([
            'name' => $data['name'],
            'id' => $id,
        ]);
    }

    public function deleteCategory(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function categoryExists(int $id): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchColumn() > 0;
    }
}