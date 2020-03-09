<?php
declare(strict_types=1);

namespace App\Accounting\Agreement;

use App\Accounting\Event\EventType;
use App\Accounting\Helpers\TemporalCollection;
use App\Accounting\PostingRule\PostingRule;

class ServiceAgreement
{
    /**
     * @var int
     */
    private $rate;

    /**
     * @var array
     */
    private $postingRules = [];

    /**
     * @param EventType $eventType
     * @param PostingRule $rule
     * @param \DateTime $date
     */
    public function addPostingRule(
        EventType $eventType,
        PostingRule $rule,
        \DateTime $date
    ): void {
        if ($this->postingRules[$eventType->export()] === null) {
            $this->postingRules[$eventType->export()] = new TemporalCollection();
        }

        $this->temporalCollection($eventType)->put($date, $rule);
    }

    public function getPostingRule(EventType $eventType, \DateTime $date): PostingRule
    {
        return $this->postingRules['$eventType'];
    }

    /**
     * @param EventType $eventType
     * @return TemporalCollection
     */
    private function temporalCollection(EventType $eventType): TemporalCollection
    {
        return $this->postingRules[$eventType->export()];
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }
}
