<?php

declare(strict_types=1);

namespace Khaydarovm\LRU\Tests;

use Khaydarovm\LRU\ArrayLRUMemoizer;
use Khaydarovm\LRU\LRUMemoizer;

final class ArrayLRUMemoizerTest extends LRUMemoizerTest
{

    protected function createLRUMemoizer(): LRUMemoizer
    {
        return new ArrayLRUMemoizer();
    }
}