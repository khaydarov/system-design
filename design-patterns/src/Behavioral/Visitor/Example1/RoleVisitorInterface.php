<?php
declare(strict_types=1);

namespace App\Behavioral\Visitor\Example1;

/**
 * Interface RoleVisitorInterface
 * @package App\Behavioral\Visitor\Example1
 */
interface RoleVisitorInterface
{
    /**
     * @param User $role
     * @return mixed
     */
    public function visitUser(User $role);

    /**
     * @param Group $role
     * @return mixed
     */
    public function visitGroup(Group $role);
}