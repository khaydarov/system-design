<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example2;


abstract class WebScrappingCommand implements CommandInterface
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $status = 0;

    /**
     * @var string
     */
    public $url;

    /**
     * WebScrappingCommand constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getURL(): string
    {
        return $this->url;
    }

    public function execute(): void
    {
        $html = $this->download();
        $this->parse($html);
    }

    public function download(): string
    {
        echo "WebScrappingCommand: downloaded {$this->url}\n";

        return '';
    }

    abstract public function parse(string $html): void;

    public function complete(): void
    {
        $this->status = 1;

    }
}