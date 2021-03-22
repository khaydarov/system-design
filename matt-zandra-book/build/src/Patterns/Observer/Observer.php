<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

/**
 * Interface Observer
 * @package App\Patterns\Observer
 */
interface Observer
{
    public function update(Observable $observable);
}