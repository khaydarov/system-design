<?php
declare(strict_types=1);

use App\Structural\DependencyInjection\DatabaseConfiguration;
use App\Structural\DependencyInjection\DatabaseConnection;
use PHPUnit\Framework\TestCase;

class DependencyInjectionTest extends TestCase
{
    public function testDI()
    {
        $config = new DatabaseConfiguration('localhost', 3306, 'leo', '123321');
        $connection = new DatabaseConnection($config);

        $this->assertSame('leo:123321@localhost:3306', $connection->getDns());
    }
}