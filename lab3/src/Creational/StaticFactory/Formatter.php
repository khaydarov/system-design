<?php
declare(strict_types=1);

namespace App\Creational\StaticFactory;

interface Formatter
{
    public function format(string $input): string;
}