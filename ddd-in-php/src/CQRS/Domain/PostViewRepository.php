<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Interface PostViewRepository
 * @package App\CQRS\Domain
 */
interface PostViewRepository
{
    /**
     * @param int $id
     * @return PostDTO|null
     */
    public function findById(int $id): ?PostDTO;
}