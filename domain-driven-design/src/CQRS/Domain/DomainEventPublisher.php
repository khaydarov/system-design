<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

class DomainEventPublisher
{
    private static $instance;
    private $subscribers = [];

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function publish(DomainEvent $event)
    {
        /** @var DomainEventSubscriber $subscriber */
        foreach ($this->subscribers as $subscriber) {
            if ($subscriber->isSubscribedTo($event)) {
                $subscriber->handle($event);
            }
        }
    }

    public function subscribe(DomainEventSubscriber $subscriber)
    {
        $this->subscribers[] = $subscriber;
    }

    private function __construct()
    {
    }
}