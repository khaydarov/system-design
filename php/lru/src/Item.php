<?php

declare(strict_types=1);

namespace Khaydarovm\LRU;

final class Item
{
    public function __construct(
        public readonly string $key,
        public readonly mixed $value,
        public ?Item $previous = null,
        public ?Item $next = null
    ) {

    }
}