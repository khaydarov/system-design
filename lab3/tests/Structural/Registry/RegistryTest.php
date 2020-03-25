<?php
declare(strict_types=1);

use App\Structural\Registry\Registry;
use PHPUnit\Framework\TestCase;

class RegistryTest extends TestCase
{
    public function testSetAndGetLogger()
    {
        $key = Registry::LOGGER;
        $logger = new StdClass();

        Registry::set($key, $logger);
        $stored_logger = Registry::get($key);

        $this->assertSame($logger, $stored_logger);
        $this->assertInstanceOf(stdClass::class, $stored_logger);
    }

    public function testThrowsExceptionWhenTryingToSetInvalidKey()
    {
        $this->expectException(\InvalidArgumentException::class);
        Registry::set('foobar', new stdClass());
    }
}