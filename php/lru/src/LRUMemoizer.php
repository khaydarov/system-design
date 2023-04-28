<?php

declare(strict_types=1);

namespace Khaydarovm\LRU;

interface LRUMemoizer
{
    public function get(string $key, callable $factory): mixed;

    public function prune(): void;
}