<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

/**
 * Class EntryId
 * @package App\Example\Content\Domain\Model\Entry
 */
class EntryId
{
    /**
     * @var int
     */
    private $value;

    /**
     * EntryId constructor.
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
     * @param int $id
     * @return static
     */
    public static function fromValue(int $id): self
    {
        return new EntryId($id);
    }
}