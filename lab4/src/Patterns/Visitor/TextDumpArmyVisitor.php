<?php
declare(strict_types=1);

namespace App\Patterns\Visitor;


class TextDumpArmyVisitor extends ArmyVisitor
{
    /**
     * @var string
     */
    private string $text = '';

    /**
     * @param Unit $unit
     */
    public function visit(Unit $unit)
    {
        $text = '';
        $pad = 4 * $unit->getDepth();

        $text .= sprintf("%{$pad}s", '');
        $text .= get_class($unit) . ': ';
        $text .= 'Fire power: ' . $unit->bombardStrength() . PHP_EOL;

        $this->text .= $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}