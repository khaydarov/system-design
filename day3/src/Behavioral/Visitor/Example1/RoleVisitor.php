<?php
declare(strict_types=1);

namespace App\Behavioral\Visitor\Example1;


class RoleVisitor implements RoleVisitorInterface
{
    /**
     * @var Role[]
     */
    private $visited = [];

    public function visitGroup(Group $role)
    {
        $this->visited[] = $role;
    }

    public function visitUser(User $role)
    {
        $this->visited[] = $role;
    }

    /**
     * @return array
     */
    public function getVisited(): array
    {
        return $this->visited;
    }
}