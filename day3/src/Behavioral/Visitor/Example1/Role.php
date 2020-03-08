<?php
declare(strict_types=1);

namespace App\Behavioral\Visitor\Example1;

/**
 * Interface Role
 * @package App\Behavioral\Visitor\Example1
 */
interface Role
{
    public function accept(RoleVisitorInterface $visitor);
}