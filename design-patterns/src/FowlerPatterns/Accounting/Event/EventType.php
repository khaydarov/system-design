<?php
declare(strict_types=1);

namespace App\FowlerPatterns\Accounting\Event;

/**
 * Class EventType
 * @package App\Accounting\Event
 */
class EventType
{
    const USAGE = 'usage';
    const SERVICE_CALL = 'service_call';
    const TAX = 'tax';
}
