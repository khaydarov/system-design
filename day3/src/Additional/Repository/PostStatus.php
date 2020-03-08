<?php
declare(strict_types=1);

namespace App\Additional\Repository;

/**
 * Class PostStatus
 * @package App\Additional\Repository
 */
class PostStatus
{
    const STATE_DRAFT_ID = 1;
    const STATE_PUBLISHED_ID = 2;

    const STATE_DRAFT = 'draft';
    const STATE_PUBLISHED = 'published';

    private static $valid_states = [
        self::STATE_DRAFT_ID => self::STATE_DRAFT,
        self::STATE_PUBLISHED_ID => self::STATE_PUBLISHED
    ];

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    public static function fromInt(int $status_id)
    {
        self::ensureIsValidId($status_id);

        return new self($status_id, self::$valid_states[$status_id]);
    }

    public static function fromString(string $status)
    {
        self::ensureIsValidName($status);

        return new self(array_search($status, self::$valid_states), $status);
    }

    private function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function toInt(): int
    {
        return $this->id;
    }

    public function toString(): string
    {
        return $this->name;
    }

    private static function ensureIsValidId(int $status)
    {
        if (!in_array($status, array_keys(self::$valid_states), true)) {
            throw new \InvalidArgumentException('Invalid status id given');
        }
    }

    private static function ensureIsValidName(string $status)
    {
        if (!in_array($status, self::$valid_states, true)) {
            throw new \InvalidArgumentException('Invalid status name given');
        }
    }
}