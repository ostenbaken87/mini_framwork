<?php

namespace App\Service\Tag;

use App\Repository\Tag\TagRepositoryInterface;
use InvalidArgumentException;

class TagService implements TagServiceInterface
{
    public function __construct(private TagRepositoryInterface $tagRepository)
    {
    }

    public function getAllTags(): array
    {
        return $this->tagRepository->getAllTags();
    }

    public function getTag(int $id): ?array
    {
        if (!$this->tagRepository->tagExists($id)){
            throw new InvalidArgumentException("Tag with ID $id not found");
        }

        return $this->tagRepository->getTagById($id);
    }

    public function createTag(array $data): array
    {
        $errors = $this->validateTagData($data);
        if (!empty($errors)) {
            throw new InvalidArgumentException(json_encode($errors));
        }
        $tadId = $this->tagRepository->createTag($data);
        return $this->getTag($tadId);
    }

    public function updateTag(int $id, array $data): array
    {
        if (!$this->tagRepository->tagExists($id)) {
            throw new InvalidArgumentException("Tag with ID $id not found");
        }
        
        $errors = $this->validateTagData($data);
        
        if (!empty($errors)) {
            throw new InvalidArgumentException(json_encode($errors));
        }
        
        $this->tagRepository->updateTag($id, $data);
        return $this->getTag($id);
    }

    public function deleteTag(int $id): bool
    {
        if (!$this->tagRepository->tagExists($id)) {
            throw new InvalidArgumentException("Tag with ID $id not found");
        }
        
        return $this->tagRepository->deleteTag($id);
    }

    public function validateTagData(array $data): array
    {
        $errors = [];
        
        if (empty($data['name'])) {
            $errors['name'] = 'Tag name is required';
        } elseif (strlen($data['name']) < 2) {
            $errors['name'] = 'Tag name must be at least 2 characters';
        } elseif (strlen($data['name']) > 50) {
            $errors['name'] = 'Tag name must not exceed 50 characters';
        }
        
        return $errors;
    }
}