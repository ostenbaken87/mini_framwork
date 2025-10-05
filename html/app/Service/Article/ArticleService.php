<?php

namespace App\Service\Article;

use App\Repository\Article\ArticleRepositoryInterface;
use InvalidArgumentException;

class ArticleService implements ArticleServiceInterface
{
    public function __construct(private ArticleRepositoryInterface $repo)
    {
    }

    public function list(): array
    {
        return $this->repo->getAll();
    }

    public function get(int $id): ?array
    {
        return $this->repo->findById($id);
    }

    public function create(array $data): array
    {
        $validated = $this->validate($data);
        $id = $this->repo->create($validated['fields'], $validated['tag_ids']);
        return $this->get($id);
    }

    public function update(int $id, array $data): array
    {
        $validated = $this->validate($data);
        $this->repo->update($id, $validated['fields'], $validated['tag_ids']);
        return $this->get($id);
    }

    public function delete(int $id): bool
    {
        return $this->repo->delete($id);
    }

    public function getFormData(?int $articleId = null): array
    {
        $categories = $this->repo->getAllCategories();
        $tags = $this->repo->getAllTags();
        $selectedTagIds = $articleId ? $this->repo->getArticleTagIds($articleId) : [];
        return compact('categories', 'tags', 'selectedTagIds');
    }

    private function validate(array $data): array
    {
        $errors = [];
        $title = trim($data['title'] ?? '');
        $categoryId = (int)($data['category_id'] ?? 0);
        $content = trim($data['content'] ?? '');
        $status = $data['status'] ?? 'draft';
        $tagIds = array_map('intval', $data['tag_ids'] ?? []);

        if ($title === '' || strlen($title) < 3) {
            $errors['title'] = 'Title must be at least 3 characters';
        }
        if ($categoryId <= 0) {
            $errors['category_id'] = 'Category is required';
        }
        if ($content === '') {
            $errors['content'] = 'Content is required';
        }
        if (!in_array($status, ['draft', 'published'], true)) {
            $errors['status'] = 'Invalid status';
        }
        if (!empty($errors)) {
            throw new InvalidArgumentException(json_encode($errors));
        }

        return [
            'fields' => [
                'title' => $title,
                'category_id' => $categoryId,
                'content' => $content,
                'status' => $status,
            ],
            'tag_ids' => $tagIds,
        ];
    }
}


