<?php
declare(strict_types=1);

namespace App\Patterns\Visitor;

require_once '../../../vendor/autoload.php';

$army_1 = new Army();
$army_1->addUnit( new Archer() );
$army_1->addUnit( new LaserCannon() );

$army_2 = new Army();
$army_2->addUnit( new Archer() );
$army_2->addUnit( new Archer() );
$army_2->addUnit( new Archer() );

$army_1->addUnit( $army_2 );

$unit = new LaserCannon();

//var_dump($army_2->unitsCount());
//var_dump($army_1->unitsCount());
//UnitScript::joinExisting($unit, $army_1);

//var_dump(sprintf("Strength is: %d", $army_1->bombardStrength()));

$visitor = new TextDumpArmyVisitor();
$army_1->accept($visitor);
var_dump($visitor->getText());