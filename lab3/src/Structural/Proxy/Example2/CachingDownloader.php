<?php
declare(strict_types=1);

namespace App\Structural\Proxy\Example2;

/**
 * Class CachingDownloader
 * @package App\Structural\Proxy\Example2
 */
class CachingDownloader implements Downloader
{
    /**
     * @var HeavyDownloader
     */
    private $downloader;

    /**
     * @var string[];
     */
    private $cache = [];

    public function __construct(HeavyDownloader $downloader)
    {
        $this->downloader = $downloader;
    }

    public function download(string $url): string
    {
        if (!isset($this->cache[$url])) {
            echo "CacheProxy MISS.\n";
            $result = $this->downloader->download($url);
            $this->cache[$url] = $result;
        } else {
            echo "CacheProxy HIT. Retrieving result from cache.\n";
        }

        return $this->cache[$url];
    }
}