<?php

declare(strict_types=1);

namespace LibraryManagementSystem;

final class BookStatus
{
    public const AVAILABLE = 1;
    public const RESERVED = 2;
    public const LOANED = 3;
    public const LOST = 4;

    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return static
     */
    public static function available(): self
    {
        return new self(self::AVAILABLE);
    }

    /**
     * @return static
     */
    public static function reserved(): self
    {
        return new self(self::RESERVED);
    }

    /**
     * @return static
     */
    public static function loaned(): self
    {
        return new self(self::LOANED);
    }

    /**
     * @return static
     */
    public static function lost(): self
    {
        return new self(self::LOST);
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}