<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example2;

/**
 * Class Middleware
 * @package App\Behavioral\ChainOfResponsibilities\Example2
 */
abstract class Middleware
{
    /**
     * @var Middleware
     */
    private $next;

    /**
     * @param Middleware $next
     * @return Middleware
     */
    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;

        return $next;
    }

    public function check(string $email, string $password): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($email, $password);
    }
}