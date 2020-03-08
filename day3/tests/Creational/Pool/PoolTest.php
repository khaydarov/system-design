<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Creational\Pool\WorkerPool;

class PoolTest extends TestCase
{
    public function testCanGetNewInstanceWithGet()
    {
        $pool = new WorkerPool();
        $worker1 = $pool->get();
        $worker2 = $pool->get();

        $this->assertCount(2, $pool);
        $this->assertNotSame($worker1, $worker2);
    }
}