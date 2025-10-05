<?php

namespace App\Repository\Tag;

use PDO;

class TagRepository implements TagRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function getAllTags(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tags ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTagById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tags WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function createTag(array $data): int
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO tags (name, created_at)
            VALUES (:name, NOW())"
        );
        $stmt->execute([
            'name' => $data['name'],
        ]);

        return (int)$this->pdo->lastInsertId();
    }

    public function updateTag(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare(
            "UPDATE tags SET name = :name, updated_at = NOW()
                    WHERE id = :id"
        );

        return $stmt->execute([
            'name' => $data['name'],
            'id' => $id,
        ]);
    }

    public function deleteTag(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM tags WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function tagExists(int $id): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM tags WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchColumn() > 0;
    }
}