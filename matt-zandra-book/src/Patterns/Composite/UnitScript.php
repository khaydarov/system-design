<?php
declare(strict_types=1);

namespace App\Patterns\Composite;

/**
 * Class UnitScript
 * @package App\Patterns\Composite
 */
class UnitScript
{
    /**
     * @param Unit $newUnit
     * @param Unit $occupyingUnit
     *
     * @return CompositeUnit
     */
    public static function joinExisting(Unit $newUnit, Unit $occupyingUnit): CompositeUnit
    {
        if ($occupyingUnit instanceof CompositeUnit) {
            $composite = $occupyingUnit->getComposite();
            $composite->addUnit( $newUnit );
        } else {
            $composite = new Army();
            $composite->addUnit( $occupyingUnit );
            $composite->addUnit( $newUnit );
        }

        return $composite;
    }
}