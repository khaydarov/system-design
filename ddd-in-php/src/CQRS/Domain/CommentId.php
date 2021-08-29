<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

use JMS\Serializer\Annotation\Type;

/**
 * Class CommentId
 * @package App\CQRS\Domain
 */
class CommentId extends AggregateId
{
    /**
     * @var int
     */
    private $value;

    /**
     * CommentId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return CommentId
     */
    public static function fromValue(int $value): self
    {
        return new static($value);
    }

    /**
     * @return CommentId
     */
    public static function generate(): self
    {
        $random = 14;

        return new static($random);
    }
}