<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example1\Subsystem;

use App\Behavioral\Mediator\Example1\Colleague;

/**
 * Class Client
 * @package App\Behavioral\Mediator\Example1\Subsystem
 */
class Client extends Colleague
{

    public function request()
    {
        $this->mediator->makeRequest();
    }

    public function output(string $content)
    {
        echo $content;
    }
}