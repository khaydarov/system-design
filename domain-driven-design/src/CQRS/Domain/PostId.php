<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

use JMS\Serializer\Annotation\Type;

/**
 * Class PostId
 * @package App\CQRS
 */
class PostId extends AggregateId
{
    /**
     * @var int
     */
    private $value;

    /**
     * PostId constructor.
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
     * @return PostId
     */
    public static function generate(): self
    {
        $random = 10;

        return new PostId($random);
    }

    /**
     * @param int $value
     * @return PostId
     */
    public static function fromValue(int $value = 0): self
    {
        return new PostId($value);
    }
}