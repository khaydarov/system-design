<?php
declare(strict_types=1);

namespace App\Accounting\Event;

/**
 * Class EventType
 * @package App\Accounting\Event
 */
class EventType
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return EventType
     */
    public static function getUsageType(): EventType
    {
        return new self('usage');
    }

    /**
     * @return EventType
     */
    public static function getServiceCallType(): EventType
    {
        return new self('service call');
    }

    /**
     * EventType constructor.
     * @param string $name
     */
    private function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function export(): string
    {
        return $this->name;
    }
}
