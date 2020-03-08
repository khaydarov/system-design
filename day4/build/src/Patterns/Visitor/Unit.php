<?php
declare(strict_types=1);

namespace App\Patterns\Visitor;

/**
 * Class Unit
 * @package App\Patterns\Composite
 */
abstract class Unit
{
    protected $depth = 0;

    public function accept(ArmyVisitor $visitor)
    {
        $refthis = new \ReflectionClass(get_class($this));
        $method = "visit" . $refthis->getShortName();
        $visitor->$method($this);
    }

    /**
     * @param int $depth
     */
    protected function setDepth(int $depth)
    {
        $this->depth = $depth;
    }

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }
    
    /**
     * @return null
     */
    public function getComposite()
    {
        return null;
    }

    /**
     * @return int
     */
    public function unitsCount()
    {
        return 1;
    }

    /**
     * @return int
     */
    abstract public function bombardStrength(): int;
}