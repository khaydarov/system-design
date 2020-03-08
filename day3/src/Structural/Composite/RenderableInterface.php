<?php
declare(strict_types=1);

namespace App\Structural\Composite;

/**
 * Interface RenderableInterface
 * @package App\Structural\Composite
 */
interface RenderableInterface
{
    public function render(): string;
}