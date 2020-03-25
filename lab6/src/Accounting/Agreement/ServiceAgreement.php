<?php
declare(strict_types=1);

namespace App\Accounting\Agreement;

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
     * @param string $eventType
     * @param PostingRule $rule
     * @param \DateTime $date
     */
    public function addPostingRule(
        string $eventType,
        PostingRule $rule,
        \DateTime $date
    ): void {
        if (!isset($this->postingRules[$eventType])) {
            $this->postingRules[$eventType] = new TemporalCollection();
        }

        $this->temporalCollection($eventType)->put($date, $rule);
    }

    public function getPostingRule(string $eventType, \DateTime $date): PostingRule
    {
        return $this->temporalCollection($eventType)->get($date);
    }

    /**
     * @param string $eventType
     * @return TemporalCollection
     */
    private function temporalCollection(string $eventType): TemporalCollection
    {
        return $this->postingRules[$eventType];
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
