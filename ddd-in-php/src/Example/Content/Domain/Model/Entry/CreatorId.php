<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

use App\Example\Shared\Domain\ValueObject;

class CreatorId extends ValueObject
{
    /**
     * @var int
     */
    private $id;

    /**
     * CreatorId constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}