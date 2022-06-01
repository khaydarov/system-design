<?php

namespace Khaydarovm\Common\FileReader;

class Reader
{
    public function read(string $file)
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