<?php
declare(strict_types=1);

namespace App\Accounting\Entry;

/**
 * Class EntryType
 * @package App\Accounting\Entry
 */
class EntryType
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return EntryType
     */
    public static function getUsageType()
    {
        return new self('Base Usage');
    }

    /**
     * @return EntryType
     */
    public static function getServiceFeeType()
    {
        return new self('Service Fee');
    }

    /**
     * EntryType constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
