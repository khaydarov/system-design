<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example2;

class EventDispatcher
{
    /**
     * @var Observer[]
     */
    private $observers = [];

    public function __construct()
    {
        $this->observers["*"] = [];
    }

    private function initEventGroup(string &$event = "*"): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = "*"): array
    {
        $this->initEventGroup($event);
        /** @var Observer[] $group */
        $group = $this->observers[$event];

        /** @var Observer[] $all */
        $all = $this->observers["*"];

        return array_merge($group, $all);
    }

    public function attach() {}

    public function detach() {}

    public function trigger(string $event, object $emitter, $data = null)
    {
        echo "EventDispatcher: Broadcasting the '${$event}' event.\n";
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update();
        }
    }
}