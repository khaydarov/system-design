<?php
declare(strict_types=1);

use App\Additional\ServiceLocator\LogService;
use App\Additional\ServiceLocator\ServiceLocator;
use PHPUnit\Framework\TestCase;

class ServiceLocatorTest extends TestCase
{
    /**
     * @var ServiceLocator
     */
    private $service_locator;

    public function setUp(): void
    {
        $this->service_locator = new ServiceLocator();
    }

    public function testHasServices()
    {
        $this->service_locator->addInstance(LogService::class, new LogService());

        $this->assertTrue($this->service_locator->has(LogService::class));
        $this->assertFalse($this->service_locator->has(self::class));
    }
}