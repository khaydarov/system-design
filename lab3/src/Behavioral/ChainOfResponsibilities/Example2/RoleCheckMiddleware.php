<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example2;

/**
 * Class RoleCheckMiddleware
 * @package App\Behavioral\ChainOfResponsibilities\Example2
 */
class RoleCheckMiddleware extends Middleware
{
    public function check(string $email, string $password): bool
    {
        if ($email === "admin@example.com") {
            echo "RoleCheckMiddleware: Hello, admin!\n";

            return true;
        }

        echo "RoleCheckMiddleware: Hello, user!\n";

        return parent::check($email, $password);
    }
}