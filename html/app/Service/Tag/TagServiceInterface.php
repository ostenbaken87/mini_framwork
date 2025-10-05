<?php

namespace App\Service\Tag;

interface TagServiceInterface
{
    public function getAllTags(): array;
    public function getTag(int $id): ?array;
    public function createTag(array $data): array;
    public function updateTag(int $id, array $data): array;
    public function deleteTag(int $id): bool;
    public function validateTagData(array $data): array;
}