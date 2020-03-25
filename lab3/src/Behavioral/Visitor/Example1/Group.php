<?php
declare(strict_types=1);

namespace App\Behavioral\Visitor\Example1;

/**
 * Class Group
 * @package App\Behavioral\Visitor\Example1
 */
class Group implements Role
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
        return sprintf("Group: %s", $this->getName());
    }

    public function accept(RoleVisitorInterface $visitor)
    {
        $visitor->visitGroup($this);
    }
}