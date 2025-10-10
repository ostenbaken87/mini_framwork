<?php

namespace App\Repository\Article;

use PDO;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT a.*, c.name AS category_name FROM articles a JOIN categories c ON c.id = a.category_id ORDER BY a.created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT a.*, c.name AS category_name FROM articles a JOIN categories c ON c.id = a.category_id WHERE a.id = :id");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(array $data, array $tagIds): int
    {
        $stmt = $this->pdo->prepare("INSERT INTO articles (title, category_id, content, status, created_at) VALUES (:title, :category_id, :content, :status, NOW())");
        $stmt->execute([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'status' => $data['status'],
        ]);
        $articleId = (int)$this->pdo->lastInsertId();
        $this->syncTags($articleId, $tagIds);
        return $articleId;
    }

    public function update(int $id, array $data, array $tagIds): bool
    {
        $stmt = $this->pdo->prepare("UPDATE articles SET title = :title, category_id = :category_id, content = :content, status = :status, updated_at = NOW() WHERE id = :id");
        $ok = $stmt->execute([
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'content' => $data['content'],
            'status' => $data['status'],
            'id' => $id,
        ]);
        $this->syncTags($id, $tagIds);
        return $ok;
    }

    public function delete(int $id): bool
    {
        $this->pdo->prepare("DELETE FROM article_tag WHERE article_id = :id")->execute(['id' => $id]);
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getAllCategories(): array
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM categories ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTags(): array
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM tags ORDER BY name");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleTagIds(int $articleId): array
    {
        $stmt = $this->pdo->prepare("SELECT tag_id FROM article_tag WHERE article_id = :id");
        $stmt->execute(['id' => $articleId]);
        return array_map('intval', array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'tag_id'));
    }

    private function syncTags(int $articleId, array $tagIds): void
    {
        $this->pdo->prepare("DELETE FROM article_tag WHERE article_id = :id")->execute(['id' => $articleId]);
        if (empty($tagIds)) {
            return;
        }
        $stmt = $this->pdo->prepare("INSERT INTO article_tag (article_id, tag_id) VALUES (:article_id, :tag_id)");
        foreach ($tagIds as $tagId) {
            $stmt->execute(['article_id' => $articleId, 'tag_id' => (int)$tagId]);
        }
    }
}


