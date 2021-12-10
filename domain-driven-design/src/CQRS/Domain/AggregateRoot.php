<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

class AggregateRoot
{
    private $recordedEvents = [];

    protected function recordApplyAndPublishThat(DomainEvent $domainEvent)
    {
        $this->recordThat($domainEvent);
        $this->applyThat($domainEvent);
        $this->publishThat($domainEvent);
    }

    protected function recordThat(DomainEvent $domainEvent)
    {
        $this->recordedEvents[] = $domainEvent;
    }

    protected function applyThat(DomainEvent $domainEvent)
    {
        $className = get_class($domainEvent);

        if ($position = strrpos($className, '\\')) {
            $className = substr($className, $position + 1);
        }

        $modifier = 'apply' . $className;
        $this->$modifier($domainEvent);
    }

    protected function publishThat(DomainEvent $domainEvent)
    {
//        DomainEventPublisher::getInstance()->publish($domainEvent);
    }

    public function getRecordedEvents()
    {
        return $this->recordedEvents;
    }

    public function clearEvents()
    {
        $this->recordedEvents = [];
    }
}