<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example1;

/**
 * Class FastStorage
 * @package App\Behavioral\ChainOfResponsibilities
 */
class FastStorage extends Handler
{
    /**
     * @var string[]
     */
    private $data;

    public function __construct(array $data, Handler $successor = null)
    {
        parent::__construct($successor);

        $this->data = $data;
    }

    /**
     * @param RequestInterface $request
     * @return string|null
     */
    protected function processing(RequestInterface $request): ?string
    {
        $key = sprintf(
            "%s?%s",
            $request->getPath(),
            $request->getQuery()
        );

        if (isset($this->data[$key])) {
            return $this->data[$key];
        }

        return null;
    }
}