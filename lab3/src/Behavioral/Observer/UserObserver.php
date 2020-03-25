<?php
declare(strict_types=1);

namespace App\Behavioral\Observer;

use SplSubject;

/**
 * Class UserObserver
 * @package App\Behavioral\Observer
 */
class UserObserver implements \SplObserver
{
    /**
     * @var User[]
     */
    private $changed_users = [];

    /**
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject)
    {
        $this->changed_users[] = clone $subject;
    }

    /**
     * @return array
     */
    public function getChangedUsers(): array
    {
        return $this->changed_users;
    }
}