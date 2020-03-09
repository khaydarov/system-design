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
     * @var EntryType
     */
    private $type;

    /**
     * @var float
     */
    private $money;

    /**
     * Entry constructor.
     * @param float $money
     * @param \DateTime $date
     * @param EntryType $type
     */
    public function __construct(
        float $money,
        \DateTime $date,
        EntryType $type
    ) {
        $this->money = $money;
        $this->date = $date;
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return EntryType
     */
    public function getType(): EntryType
    {
        return $this->type;
    }
}
