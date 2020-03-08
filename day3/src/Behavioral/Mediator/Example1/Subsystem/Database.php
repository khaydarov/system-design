<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example1\Subsystem;

use App\Behavioral\Mediator\Example1\Colleague;

/**
 * Class Database
 * @package App\Behavioral\Mediator\Example1\Subsystem
 */
class Database extends Colleague
{
    public function getData(): string
    {
        return 'World';
    }
}