<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example1\Subsystem;

use App\Behavioral\Mediator\Example1\Colleague;

/**
 * Class Server
 * @package App\Behavioral\Mediator\Example1\Subsystem
 */
class Server extends Colleague
{
    public function process()
    {
        $data = $this->mediator->queryDb();
        $this->mediator->sendResponse(sprintf("Hello %s", $data));
    }
}