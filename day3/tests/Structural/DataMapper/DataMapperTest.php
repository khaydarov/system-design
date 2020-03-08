<?php
declare(strict_types=1);

use App\Structural\DataMapper\StorageAdapter;
use App\Structural\DataMapper\User;
use App\Structural\DataMapper\UserMapper;
use \PHPUnit\Framework\TestCase;

class DataMapperTest extends TestCase
{
    public function testCanMapUserFromStorage()
    {
        $storage = new StorageAdapter([
            1 => [
                'username' => 'Leonardo Da Vinci',
                'email' => 'leolove@gmail.com'
            ]
        ]);

        $mapper = new UserMapper($storage);
        $user = $mapper->findById(1);

        $this->assertInstanceOf(User::class, $user);
    }
}