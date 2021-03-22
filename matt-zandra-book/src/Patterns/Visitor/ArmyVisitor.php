<?php
declare(strict_types=1);

namespace App\Patterns\Visitor;

/**
 * Class ArmyVisitor
 * @package App\Patterns\Visitor
 */
abstract class ArmyVisitor
{
    abstract public function visit(Unit $unit);

    public function visitArcher(Archer $unit)
    {
        $this->visit($unit);
    }

    public function visitLaserCannon(LaserCannon $unit)
    {
        $this->visit($unit);
    }

    public function visitArmy(Army $unit)
    {
        $this->visit($unit);
    }
}