<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Persistence;

use App\CQRS\Domain\PostDTO;
use App\CQRS\Domain\PostViewRepository;
use Aura\Sql\ExtendedPdo;

/**
 * Class PsqlViewRepository
 * @package App\CQRS\Infrastructure\Persistence
 */
class PsqlViewRepository implements PostViewRepository
{
    /**
     * @var ExtendedPdo
     */
    private $pdo;

    /**
     * PsqlViewRepository constructor.
     * @param ExtendedPdo $pdo
     */
    public function __construct(ExtendedPdo $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id
     * @return PostDTO|null
     */
    public function findById(int $id): ?PostDTO
    {
        $row = $this->pdo->fetchOne("SELECT * FROM posts WHERE id = :id", [
            'id' => $id
        ]);

        if (empty($row)) {
            return null;
        }

        return new PostDTO(
            $row['id'],
            $row['title'],
            $row['content'],
            new \DateTimeImmutable($row['created_at']),
            $row['is_published']
        );
    }
}