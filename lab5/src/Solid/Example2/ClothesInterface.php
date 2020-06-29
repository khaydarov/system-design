<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Interface ClothesInterface
 * @package App\Solid\Example2
 */
interface ClothesInterface
{
    public function setColor($color);
    public function setSize($size);
    public function setMaterial($material);
}