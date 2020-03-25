<?php
declare(strict_types=1);

use App\Additional\EAV\Attribute;
use App\Additional\EAV\Entity;
use App\Additional\EAV\Value;
use PHPUnit\Framework\TestCase;

class EAVTest extends TestCase
{
    public function testCanAddAttributeToEntity()
    {
        $color_attribute = new Attribute('color');
        $color_silver = new Value($color_attribute, 'silver');
        $color_black = new Value($color_attribute, 'black');

        $memory_attribute = new Attribute('memory');
        $memory_8gb = new Value($memory_attribute, '8GB');

        $entity = new Entity('MacBook Pro', [$color_silver, $color_black, $memory_8gb]);

        $this->assertEquals('MacBook Pro, color: silver, color: black, memory: 8GB', (string) $entity);
    }
}