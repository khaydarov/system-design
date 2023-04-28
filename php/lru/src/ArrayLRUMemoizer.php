<?php

declare(strict_types=1);

namespace Khaydarovm\LRU;

/**
 * @template TItem
 */
final class ArrayLRUMemoizer implements LRUMemoizer
{
    private const DEFAULT_CAPACITY = 100;

    /**
     * @var array<string, TItem>
     */
    private array $itemsByKey = [];

    public function __construct(
        private readonly int $capacity = self::DEFAULT_CAPACITY
    ) {
    }

    /**
     * @param string $key
     * @param callable(): TItem $factory
     * @return TItem
     */
    public function get(string $key, callable $factory): mixed
    {
        if (array_key_exists($key, $this->itemsByKey)) {
            $value = $this->itemsByKey[$key];
            unset($this->itemsByKey[$key]);
            $this->itemsByKey[$key] = $value;

            return $value;
        }

        $value = $factory();
        $this->itemsByKey[$key] = $value;

        if (\count($this->itemsByKey) > $this->capacity) {
            array_shift($this->itemsByKey);
        }

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function prune(): void
    {
        $this->itemsByKey = [];
    }
}