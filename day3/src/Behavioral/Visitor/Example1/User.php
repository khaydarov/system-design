<?php
declare(strict_types=1);

namespace App\Behavioral\Visitor\Example1;

/**
 * Class User
 * @package App\Behavioral\Visitor\Example1
 */
class User implements Role
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return sprintf("User %s", $this->getName());
    }

    public function accept(RoleVisitorInterface $visitor)
    {
        $visitor->visitUser($this);
    }
}