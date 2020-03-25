<?php
declare(strict_types=1);

use App\Behavioral\NullObject\NullLogger;
use App\Behavioral\NullObject\PrintLogger;
use App\Behavioral\NullObject\Service;
use PHPUnit\Framework\TestCase;

class NullObjectTest extends TestCase
{
    public function testNullObject()
    {
        $service = new Service(new NullLogger());
        $this->expectOutputString('');
        $service->doSomething();
    }

    public function testStandardLogger()
    {
        $service = new Service(new PrintLogger());
        $this->expectOutputString('We are in App\Behavioral\NullObject\Service::doSomething');
        $service->doSomething();
    }
}