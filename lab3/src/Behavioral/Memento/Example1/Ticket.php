<?php
declare(strict_types=1);

namespace App\Behavioral\Memento\Example1;

/**
 * Class Ticket
 * @package App\Behavioral\Memento\Example1
 */
class Ticket
{
    /**
     * @var State
     */
    private $current_state;

    public function __construct()
    {
        $this->current_state = new State(State::STATE_CREATED);
    }

    public function open()
    {
        $this->current_state = new State(State::STATE_OPENED);
    }

    public function assign()
    {
        $this->current_state = new State(State::STATE_ASSIGNED);
    }

    public function close()
    {
        $this->current_state = new State(State::STATE_CLOSED);
    }

    public function saveToMemento(): Memento
    {
        return new Memento(clone $this->current_state);
    }

    public function restoreFromMemento(Memento $memento)
    {
        $this->current_state = $memento->getState();
    }

    public function getState(): State
    {
        return $this->current_state;
    }
}