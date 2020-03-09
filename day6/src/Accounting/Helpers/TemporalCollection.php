<?php
declare(strict_types=1);

namespace App\Accounting\Helpers;

use App\Accounting\PostingRule\PostingRule;

/**
 * Class TemporalCollection
 * @package App\Accounting
 */
class TemporalCollection
{
    private $collection = [];

    /**
     * @param \DateTime $date
     * @param PostingRule $rule
     */
    public function put(\DateTime $date, PostingRule $rule): void
    {
        $this->collection[$date->format('dd-mm-YYYY')] = $rule;
    }

    /**
     * @param \DateTime $date
     * @return PostingRule
     */
    public function get(\DateTime $date): PostingRule
    {
        return $this->collection[$date->format('dd-mm-YYYY')];
    }
}
