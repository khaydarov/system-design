<?php
declare(strict_types=1);

use App\Structural\Facade\Example1\BiosInterface;
use App\Structural\Facade\Example1\Facade;
use App\Structural\Facade\Example1\OsInterface;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function testComputerOn()
    {
        $os = $this->createMock(OsInterface::class);
        $os->method('getName')
            ->will($this->returnValue('Linux'));

        /** @var BiosInterface|PHPUnit\Framework\MockObject\MockObject $bios */
        $bios = $this->getMockBuilder(BiosInterface::class)
            ->setMethods(['launch', 'execute', 'waitForKeyPress'])
            ->disableAutoload()
            ->getMock();

        $bios->expects($this->once())
            ->method('launch')
            ->with($os);

        $facade = new Facade($bios, $os);

        // turn on computer
        $facade->turnOn();

        // assert os name
        $this->assertSame('Linux', $os->getName());
    }
}