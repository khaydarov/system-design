<?php
declare(strict_types=1);

namespace App\LSB;

/**
 * Class User
 * @package App\LSB
 */
class User extends DomainObject
{
    public function iAmUser(): string
    {
        return 'iamuser';
    }
}