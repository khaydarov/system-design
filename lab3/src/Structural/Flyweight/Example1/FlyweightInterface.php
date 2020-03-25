<?php
declare(strict_types=1);

namespace App\Structural\Flyweight\Example1;

/**
 * Class FlyweightInterface
 * @package App\Structural\Flyweight
 */
interface FlyweightInterface
{
    public function render(string $extrinsic_state): string;
}