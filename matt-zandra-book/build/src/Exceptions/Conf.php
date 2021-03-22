<?php
declare(strict_types=1);

namespace App\Exceptions;

use SimpleXMLElement;

/**
 * Class Conf
 * @package App\Exceptions
 */
class Conf
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var SimpleXMLElement
     */
    private $xml;

    /**
     * @var string
     */
    private $lastMatch;

    /**
     * Conf constructor.
     * @param string $file
     *
     * @throws \Exception
     */
    public function __construct(string $file)
    {
        if (!file_exists($file)) {
            throw new \Exception("File not found");
        }

        $this->file = $file;
        $this->xml = simplexml_load_string(file_get_contents($this->file));
    }

    /**
     * @throws \Exception
     */
    public function write(): void
    {
        if ( !is_writable($this->file) ) {
            throw new \Exception("File is not writable");
        }
        file_put_contents($this->file, $this->xml->asXML());
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function get(string $key): ?string
    {
        $xpath = sprintf('item[@name="%s"]', $key);
        $matches = $this->xml->xpath($xpath);
        if (count($matches)) {
            $this->lastMatch = $matches[0];
            return (string) $this->lastMatch;
        }

        return null;
    }

    public function set(string $key, string $value): void
    {
        if ($this->get($key) !== null) {
            $this->lastMatch[0] = $value;
            return;
        }

        $this->xml->addChild('item', $value)
            ->addAttribute('name', $key);
    }
}