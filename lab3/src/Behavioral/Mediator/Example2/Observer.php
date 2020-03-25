<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example2;

/**
 * Interface Observer
 * @package App\Behavioral\Mediator\Example2
 */
interface Observer
{
    public function update(string $event, object $emitter, $data = null);
}