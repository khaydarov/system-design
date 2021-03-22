<?php
declare(strict_types=1);

namespace App\Structural\Composite;

/**
 * Class Input
 * @package App\Structural\Composite
 */
class InputElement implements RenderableInterface
{
    public function render(): string
    {
        return '<input type="text">';
    }
}