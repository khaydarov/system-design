<?php
declare(strict_types=1);

namespace App\traits;

/**
 * Trait TaxTools
 * @package App\traits
 */
trait TaxTools
{
    private static $taxrate = 0.15;

    public function calculateTax(float $price): float
    {
        return $price * self::$taxrate;
    }

    public static function getTaxRate(): float
    {
        return self::$taxrate;
    }

    abstract public function setTaxRate(float $taxrate): void;
}