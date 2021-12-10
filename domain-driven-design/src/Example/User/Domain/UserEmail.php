<?php

declare(strict_types=1);

namespace App\Example\User\Domain;

use App\Example\Shared\Domain\ValueObject;

/**
 * Class UserEmail
 * @package App\Example\User\Domain
 */
class UserEmail extends ValueObject
{
    /**
     * @var string
     */
    private $email;

    /**
     * UserEmail constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}