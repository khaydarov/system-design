<?php
declare(strict_types=1);

namespace App\Additional\Repository;

/**
 * Interface Persistence
 * @package App\Additional\Repository
 */
interface Persistence
{
    public function generateId(): int;

    public function persist(array $data);

    public function retrieve(int $id): array;

    public function delete(int $id);
}