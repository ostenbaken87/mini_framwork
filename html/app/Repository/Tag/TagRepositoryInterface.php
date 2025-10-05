<?php

namespace App\Repository\Tag;

interface TagRepositoryInterface
{
    public function getAllTags(): array;
    public function getTagById(int $id): ?array;
    public function createTag(array $data): int;
    public function updateTag(int $id, array $data): bool;
    public function deleteTag(int $id): bool;
    public function tagExists(int $id): bool;
}