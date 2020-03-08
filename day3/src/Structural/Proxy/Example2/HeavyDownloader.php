<?php
declare(strict_types=1);

namespace App\Structural\Proxy\Example2;

/**
 * Class HeavyDownloader
 * @package App\Structural\Proxy\Example2
 */
class HeavyDownloader implements Downloader
{
    public function download(string $url): string
    {
        echo "Downloading a file from the internet.\n";
        // ...
        echo "Downloaded bytes: ...";

        return 'path to the downloaded file';
    }
}