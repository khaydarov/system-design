<?php
declare(strict_types=1);

namespace App\Patterns\Prototype\Sea;

/**
 * Class Sea
 * @package App\Patterns\Prototype\Sea
 */
abstract class Sea
{
    private $navigability = 0;

    public function __construct(int $navigability)
    {
        $this->navigability = $navigability;
    }

    /**
     * @param int $navigability
     */
    public function changeNavigability(int $navigability): void
    {
        $this->navigability = $navigability;
    }
}