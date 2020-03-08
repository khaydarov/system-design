<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example2;

/**
 * Class IMDBGenresScrappingCommand
 * @package App\Behavioral\Command\Example2
 */
class IMDBGenresScrappingCommand extends WebScrappingCommand
{
    /**
     * IMDBGenresScrappingCommand constructor.
     */
    public function __construct()
    {
        parent::__construct("https://www.imdb.com/feature/genre/");
    }

    public function parse($html): void
    {
        preg_match_all("|href=\"(https://www.imdb.com/search/title\?genres=.*?)\"|", $html, $matches);
        echo "IMDBGenresScrapingCommand: Discovered " . count($matches[1]) . " genres.\n";

        foreach ($matches[1] as $genre) {
            Queue::get()->add(new IMDBGenrePageScrappingCommand($genre));
        }
    }
}