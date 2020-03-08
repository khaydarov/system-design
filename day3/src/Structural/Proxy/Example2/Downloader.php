<?php
declare(strict_types=1);

namespace App\Structural\Proxy\Example2;

/**
 * Interface Downloader
 * @package App\Structural\Proxy\Example2
 */
interface Downloader
{
    public function download(string $url): string;
}