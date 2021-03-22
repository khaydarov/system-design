<?php
declare(strict_types=1);

namespace App\Structural\Bridge\Example1;

interface Formatter
{
    public function format(string $text): string;
}