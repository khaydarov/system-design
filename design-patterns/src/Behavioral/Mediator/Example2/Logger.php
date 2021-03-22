<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example2;

/**
 * Class Logger
 * @package App\Behavioral\Mediator\Example2
 */
class Logger implements Observer
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;

        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function update(string $event, object $emitter, $data = null)
    {
        $entry = date("Y-m-d H:i:s") . ": '${event}' with data" . json_encode($data) . "'\n'";
        file_put_contents($this->filename, $entry, FILE_APPEND);

        echo sprintf("Logger: I've written %s entry to the log.\n", $event);
    }
}