<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example2;

/**
 * Class UserExistsMiddleware
 * @package App\Behavioral\ChainOfResponsibilities\Example2
 */
class UserExistsMiddleware extends Middleware
{
    /**
     * @var Server
     */
    private $server;

    /**
     * UserExistsMiddleware constructor.
     * @param Server $server
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->server->hasEmail($email)) {
            echo "UserExistsMiddleware: This email is not registered\n";

            return false;
        }

        if (!$this->server->isValidPassword($email, $password)) {
            echo "UserExistsMiddleware: Wrong password\n";

            return false;
        }

        return parent::check($email, $password);
    }
}