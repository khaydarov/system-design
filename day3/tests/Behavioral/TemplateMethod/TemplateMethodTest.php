<?php
declare(strict_types=1);

use App\Behavioral\TemplateMethod\BeachJourney;
use PHPUnit\Framework\TestCase;

class TemplateMethodTest extends TestCase
{
    public function testCanGetOnVacationOnTheBeach()
    {
        $beach_journey = new BeachJourney();
        $beach_journey->takeATrip();

        $this->assertSame(
            [
                'Buy a flight ticket',
                'Taking the plane',
                'Swimming and sun-bathing',
                'Taking the plane'
            ],
            $beach_journey->getThingsTodo()
        );
    }
}