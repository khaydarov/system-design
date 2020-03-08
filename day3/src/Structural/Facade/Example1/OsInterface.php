<?php
declare(strict_types=1);

namespace App\Structural\Facade\Example1;

/**
 * Interface OsInterface
 * @package App\Structural\Facade
 */
interface OsInterface
{
    public function halt();

    public function getName(): string;
}