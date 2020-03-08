<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example2;

/**
 * Interface InputFormat
 * @package App\Structural\Decorator\Example2
 */
interface InputFormat
{
    public function formatText(string $text): string;
}