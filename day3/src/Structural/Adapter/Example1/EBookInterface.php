<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example1;

/**
 * Interface EBookInterface
 * @package App\Structural\Adapter
 */
interface EBookInterface
{
    public function unlock();
    public function pressNext();

    /**
     * @return array
     */
    public function getPage(): array;
}