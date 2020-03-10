<?php
declare(strict_types=1);

namespace App\Accounting\Entry;

/**
 * Class EntryType
 * @package App\Accounting\Entry
 */
class EntryType
{
    public const USAGE = 'usage';
    public const SERVICE_FEE = 'service fee';
    public const TAX = 'tax';

    // monetary
    public const PAYMENT = 'payment';
    public const TRANSFER = 'transfer';
}
