<?php

declare(strict_types=1);

namespace Khaydarovm\LRU;

final class LinkedHashMapLRUMemoizer implements LRUMemoizer
{
    private const DEFAULT_CAPACITY = 100;

    /**
     * @var array<string, Item>
     */
    private array $itemsByKey = [];
    private Item $head;
    private Item $tail;

    /**
     * @param positive-int $capacity
     */
    public function __construct(
        private readonly int $capacity = self::DEFAULT_CAPACITY
    ) {
        $this->head = new Item('', 0);
        $this->tail = new Item('', 0);

        $this->head->next = $this->tail;
        $this->tail->previous = $this->head;
    }

    public function get(string $key, callable $factory): mixed
    {
        if (array_key_exists($key, $this->itemsByKey)) {
            $item = $this->itemsByKey[$key];
            $this->makeItemNewest($item);

            return $item->value;
        }

        $item = new Item($key, $factory());
        $this->itemsByKey[$key] = $item;
        $this->addNewestItem($item);
        $this->ensureCapacity();

        return $item->value;
    }

    public function prune(): void
    {
        $this->itemsByKey = [];
    }

    public function printItems(): void
    {
        if (count($this->itemsByKey) === 0) {
            print_r("Empty\n");

            return;
        }

        $current = $this->head->next;
        while ($current !== $this->tail) {
            if ($current === null) {
                break;
            }

            print_r(sprintf("key: %s, value: %s\n", $current->key, $current->value));
            $current = $current->next;
        }
    }

    public function removeOldest(): void
    {
        $oldest = $this->head->next;
        unset($this->itemsByKey[$oldest->key]);
        $this->head->next = $oldest->next;
    }

    private function makeItemNewest(Item $item): void
    {
        if ($item->next === $this->tail) {
            return;
        }

        $item->previous->next = $item->next;
        $item->next->previous = $item->previous;

        $this->addNewestItem($item);
    }

    private function addNewestItem(Item $item): void
    {
        $this->tail->previous->next = $item;
        $item->previous = $this->tail->previous;

        $this->tail->previous = $item;
        $item->next = $this->tail;
    }

    private function ensureCapacity(): void
    {
        if (count($this->itemsByKey) <= $this->capacity) {
            return;
        }

        $this->removeOldest();
    }
}