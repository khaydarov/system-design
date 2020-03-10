<?php
declare(strict_types=1);

namespace App\Accounting\Entry;

class Entry
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $amount;

    /**
     * Entry constructor.
     * @param float $amount
     * @param \DateTime $date
     * @param EntryType $type
     */
    public function __construct(
        float $amount,
        \DateTime $date,
        string $type
    ) {
        $this->amount = $amount;
        $this->date = $date;
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
