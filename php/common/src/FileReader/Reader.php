<?php

namespace Khaydarovm\Common\FileReader;

class Reader
{
    public const SECONDS = 1000;

    /**
     * @var int
     */
    private $timeout;

    /**
     * @var int
     */
    private $memoryLimit;

    /**
     * @param int $timeout — milliseconds
     * @param int $memoryLimit - megabytes
     */
    public function __construct(int $timeout, int $memoryLimit)
    {
        $this->timeout = $timeout;
        $this->memoryLimit = $memoryLimit * 1000 * 1000;
    }

    /**
     * @param string $file
     *
     * @return array
     */
    public function readArray(string $file): array
    {
        $start = microtime(true);
        $lines = [];
        $fp = fopen($file, "r");
        while (!feof($fp)) {
            $memoryUsage = memory_get_usage(true);

            $buffer = trim(fgets($fp, 1024));
            $lineParts = explode( ':', $buffer);

            if (count($lineParts) < 2) {
                continue;
            }

            $lines[] = $lineParts;

            if (
                $memoryUsage >= $this->memoryLimit
                || (microtime(true) - $start) * 1000 >= $this->timeout
            ) {
                fclose($fp);
                return $lines;
            }
        }

        fclose($fp);
        return $lines;
    }

    public function readGenerator(string $file): \Generator
    {
        $fp = fopen($file, "r");
        while (!feof($fp)) {
            $buffer = trim(fgets($fp, 1024));
            $lineParts = explode( ':', $buffer);

            if (count($lineParts) < 2) {
                continue;
            }

            yield $lineParts;
        }

        fclose($fp);
    }

    public function fill(string $file)
    {
        $fp = fopen($file, "a");
        for ($i = 0; $i < 5000000000; $i++) {
            $s = time() . ":200";
            fwrite($fp, $s);
            fwrite($fp, "\n");
        }
    }
}