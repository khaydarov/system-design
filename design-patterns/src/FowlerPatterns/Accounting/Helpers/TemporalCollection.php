<?php
declare(strict_types=1);

namespace App\FowlerPatterns\Accounting\Helpers;

use App\FowlerPatterns\Accounting\PostingRule\PostingRule;

/**
 * Class TemporalCollection
 * @package App\FowlerPatterns\Accounting
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
        $this->collection[$date->format('d-m-Y')] = $rule;
    }

    /**
     * @param \DateTime $date
     * @return PostingRule
     */
    public function get(\DateTime $date): PostingRule
    {
        return $this->collection[$date->format('d-m-Y')];
    }
}
