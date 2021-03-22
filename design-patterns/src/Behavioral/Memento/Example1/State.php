<?php
declare(strict_types=1);

namespace App\Behavioral\Memento\Example1;

/**
 * Class State
 * @package App\Behavioral\Memento\Example1
 */
class State
{
    const STATE_CREATED = 'created';
    const STATE_OPENED = 'opened';
    const STATE_ASSIGNED = 'assigned';
    const STATE_CLOSED = 'closed';

    /**
     * @var string
     */
    private $state;

    /**
     * @var string[]
     */
    private static $valid_states = [
        self::STATE_CREATED,
        self::STATE_OPENED,
        self::STATE_ASSIGNED,
        self::STATE_CLOSED
    ];

    /**
     * State constructor.
     * @param string $state
     */
    public function __construct(string $state)
    {
        self::ensureIsValidState($state);

        $this->state = $state;
    }

    /**
     * @param string $state
     */
    private static function ensureIsValidState(string $state)
    {
        if (!in_array($state, self::$valid_states)) {
            throw new \InvalidArgumentException('Invalid state given');
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->state;
    }
}