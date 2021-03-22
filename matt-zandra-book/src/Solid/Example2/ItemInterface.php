<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Interface ItemInterface
 * @package App\Solid\Example2
 */
interface ItemInterface
{
    public function setCondition($condition);
    public function setPrice($price);
}