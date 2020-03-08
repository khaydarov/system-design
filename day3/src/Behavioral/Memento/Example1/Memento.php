<?php
declare(strict_types=1);

namespace App\Behavioral\Memento\Example1;

/**
 * Class Memento
 * @package App\Behavioral\Memento\Example1
 */
class Memento
{
    /**
     * @var State
     */
    private $state;

    /**
     * Memento constructor.
     * @param State $state_to_save
     */
    public function __construct(State $state_to_save)
    {
        $this->state = $state_to_save;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }
}