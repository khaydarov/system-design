<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example1;

/**
 * Class Handler
 * @package App\Behavioral\ChainOfResponsibilities
 */
abstract class Handler
{
    /**
     * @var null
     */
    private $successor = null;

    public function __construct(Handler $handler = null)
    {
        $this->successor = $handler;
    }

    final public function handle(RequestInterface $request): string
    {
        $processed = $this->processing($request);

        if ($processed === null) {
            if ($this->successor !== null) {
                $processed = $this->successor->handle($request);
            }
        }

        return $processed;
    }

    abstract protected function processing(RequestInterface $request);
}