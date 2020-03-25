<?php
declare(strict_types=1);

namespace App\Patterns\FrontController;

/**
 * Class Request
 * @package App\Patterns\Registry
 */
abstract class Request
{
    /**
     * @var array
     */
    protected $properties = [];

    /**
     * @var array
     */
    protected $feedback = [];

    /**
     * @var string
     */
    protected $path = '/';

    public function __construct()
    {
        $this->init();
    }

    abstract public function init();

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getProperty(string $key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }

        return null;
    }

    public function setProperty(string $key, $value)
    {
        $this->properties[$key] = $value;
    }

    public function addFeedback(string $message)
    {
        $this->feedback[] = $message;
    }

    public function getFeedback(): array
    {
        return $this->feedback;
    }

    public function getFeedbackString(string $separator = "\n"): string
    {
        return implode($separator, $this->feedback);
    }

    public function clearFeedback()
    {
        $this->feedback = [];
    }
}