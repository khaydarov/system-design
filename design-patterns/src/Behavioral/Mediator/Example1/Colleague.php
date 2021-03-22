<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example1;

/**
 * Class Colleague
 * @package App\Behavioral\Mediator\Example1
 */
abstract class Colleague
{
    /**
     * @var MediatorInterface
     */
    protected $mediator;

    /**
     * @param MediatorInterface $mediator
     */
    public function setMediator(MediatorInterface $mediator)
    {
        $this->mediator = $mediator;
    }
}