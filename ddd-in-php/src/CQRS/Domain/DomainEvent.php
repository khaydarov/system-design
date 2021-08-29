<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

abstract class DomainEvent
{
    /**
     * @var \DateTimeImmutable
     */
    private $occurredOn;

    /**
     * DomainEvent constructor.
     * @param \DateTimeImmutable $occurredOn
     */
    public function __construct(\DateTimeImmutable $occurredOn)
    {
        $this->occurredOn = $occurredOn;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    abstract public function getData(): array;
    abstract public function getAggregateId();
}