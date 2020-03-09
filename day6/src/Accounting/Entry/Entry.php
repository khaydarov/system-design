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
     * @var int
     */
    private $money;

    /**
     * Entry constructor.
     * @param int $money
     * @param \DateTime $date
     * @param EntryType $type
     */
    public function __construct(
        int $money,
        \DateTime $date,
        EntryType $type
    ) {
        $this->money = $money;
        $this->date = $date;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getMoney(): int
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
