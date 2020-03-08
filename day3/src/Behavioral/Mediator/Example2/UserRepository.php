<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example2;

/**
 * Class UserRepository
 * @package App\Behavioral\Mediator\Example2
 */
class UserRepository implements Observer
{
    /**
     * @var array
     */
    private $users = [];

    /**
     * @var EventDispatcher
     */
    private $dispatcher = null;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->dispatcher = new EventDispatcher();
    }

    public function update(string $event, object $emitter, $data = null): void
    {
        switch ($event) {
            case 'users:deleted':
                if ($emitter === $this) {
                    return;
                }
                $this->deleteUser($data, true);
                break;
        }
    }

    public function initialize(string $filename): void
    {
        echo "UserRepository: Loading user records from a file.\n";
        $this->dispatcher->trigger('users:init', $this, $filename);
    }

    public function createUser(array $data, bool $silent = false): User
    {
        echo "UserRepository: Creating a user.\n";

        $user = new User();


    }
}