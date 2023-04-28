<?php

declare(strict_types=1);

namespace Khaydarovm\LRU\Tests;

use Khaydarovm\LRU\LinkedHashMapLRUMemoizer;
use Khaydarovm\LRU\LRUMemoizer;

final class LinkedHashMapLRUMemoizerTest extends LRUMemoizerTest
{
    protected function createLRUMemoizer(): LRUMemoizer
    {
        return new LinkedHashMapLRUMemoizer();
    }
}