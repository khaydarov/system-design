<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example2;

/**
 * Class Server
 * @package App\Behavioral\ChainOfResponsibilities\Example2
 */
class Server
{
    /**
     * @var array
     */
    private $users = [];

    /**
     * @var Middleware
     */
    private $middleware;

    /**
     * @param Middleware $middleware
     */
    public function setMiddleware(Middleware $middleware): void
    {
        $this->middleware = $middleware;
    }

    public function logIn(string $email, string $password): bool
    {
        if ($this->middleware->check($email, $password)) {
            echo "Server: Authorization has been successful!\n";

            return true;
        }

        return false;
    }

    public function register(string $email, string $password): void
    {
        $this->users[$email] = $password;
    }

    public function hasEmail(string $email): bool
    {
        return isset($this->users[$email]);
    }

    public function isValidPassword(string $email, string $password): bool
    {
        return $this->users[$email] === $password;
    }
}