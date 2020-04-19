<?php

declare(strict_types=1);

namespace App;

/**
 * Interface Sanitizer
 * @package App
 */
interface Sanitizer
{
    public function doSanitize($text): string;
}
