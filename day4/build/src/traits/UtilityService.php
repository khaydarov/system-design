<?php
declare(strict_types=1);

namespace App\traits;

class UtilityService extends Service implements IdentityObject
{
    use IdentityTrait, TaxTools;

    public function setTaxRate(float $taxrate): void
    {
        self::$taxrate = $taxrate;
    }
}