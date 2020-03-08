<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

/**
 * Class Login
 * @package App\Patterns\Observer
 */
class Login implements Observable
{
    /**
     * @var array
     */
    private $observers = [];

    /**
     * @var array
     */
    private $storage;

    const LOGIN_USER_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 3;

    /**
     * @param Observer $observer
     */
    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    /**
     * @param Observer $observer
     */
    public function detach(Observer $observer): void
    {
        $this->observers = array_filter(
            $this->observers,
            function ($a) use ($observer) {
                return (! ($a === $observer));
            }
        );
    }

    /**
     * Notify all observer about changes
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * @param string $user
     * @param string $pass
     * @param string $ip
     * @return bool
     *
     * @throws \Exception
     */
    public function handleLogin(string $user, string $pass, string $ip): bool
    {
        switch (random_int(1, 3)) {
            case 1:
                $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isValid = false;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isValid = false;
                break;
            case 3:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isValid = true;
                break;
        }

        $this->notify();
        return $isValid;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return 1;
    }

    private function setStatus(int $status, string $user, string $ip): void
    {
        // do something..
    }
}