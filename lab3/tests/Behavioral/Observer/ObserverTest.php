<?php
declare(strict_types=1);

use App\Behavioral\Observer\User;
use App\Behavioral\Observer\UserObserver;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    public function testChangeUser()
    {
        $observer = new UserObserver();

        $user = new User();
        $user->attach($observer);

        $user->changeEmail('foo@bar.com');
        $this->assertCount(1, $observer->getChangedUsers());

        $user->changeEmail('bar@foo.com');
        $this->assertCount(2, $observer->getChangedUsers());
    }
}