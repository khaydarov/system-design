<?php
declare(strict_types=1);

use App\Behavioral\Visitor\Example1\Group;
use App\Behavioral\Visitor\Example1\Role;
use App\Behavioral\Visitor\Example1\RoleVisitor;
use App\Behavioral\Visitor\Example1\User;
use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    /**
     * @var RoleVisitor
     */
    private $visitor;

    protected function setUp(): void
    {
        $this->visitor = new RoleVisitor();
    }

    public function provideRoles()
    {
        return [
            [
                new User('Dominik'),
                new Group('Administrators')
            ]
        ];
    }

    /**
     * @dataProvider provideRoles
     *
     * @param Role $role
     */
    public function testVisitSomeRole(Role $role)
    {
        $role->accept($this->visitor);
        $this->assertSame($role, $this->visitor->getVisited()[0]);
    }
}