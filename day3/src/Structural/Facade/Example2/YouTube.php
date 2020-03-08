<?php
declare(strict_types=1);

namespace App\Structural\Facade\Example2;

/**
 * Class YouTube
 * @package App\Structural\Facade\Example2
 */
class YouTube
{
    private $api_key = '';

    /**
     * YouTube constructor.
     * @param string $api_key
     */
    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
    }

    /**
     * @return string
     */
    public function fetchVideo(): string
    {
        return '';
    }

    /**
     * @param string $path
     */
    public function saveAs(string $path): void
    {
    }
}