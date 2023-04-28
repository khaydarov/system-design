<?php

declare(strict_types=1);

namespace Khaydarovm\LRU\Tests;

use Khaydarovm\LRU\LRUMemoizer;
use PHPUnit\Framework\TestCase;

abstract class LRUMemoizerTest extends TestCase
{
    final public function testItSavesValue(): void
    {
        $memoizer = $this->createLRUMemoizer();
        $memoizer->get('a', fn (): string => 'a1');

        $a = $memoizer->get('a', fn (): string => 'a2');

        self::assertSame('a1', $a);
    }

    final public function testItPrunes(): void
    {
        $memoizer = $this->createLRUMemoizer();
        $memoizer->get('a', fn (): string => 'a1');

        $memoizer->prune();
        $a = $memoizer->get('a', fn (): string => 'a2');

        self::assertSame('a2', $a);
    }

    abstract protected function createLRUMemoizer(): LRUMemoizer;
}