<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

class EntryState
{
    public const DRAFTED = 0;
    public const PUBLISHED = 1;

    /**
     * @var int
     */
    private $value;

    /**
     * EntryState constructor.
     * @param int $state
     * @throws \Exception
     */
    public function __construct(int $state)
    {
        $this->validateState($state);
        $this->value = $state;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    private function validateState(int $state)
    {
        if (!in_array($state, [self::DRAFTED, self::PUBLISHED])) {
            throw new \Exception('invalid state');
        }
    }

    /**
     * @return static
     */
    public static function drafted(): self
    {
        return new EntryState(self::DRAFTED);
    }

    /**
     * @return static
     */
    public static function published(): self
    {
        return new EntryState(self::PUBLISHED);
    }
}