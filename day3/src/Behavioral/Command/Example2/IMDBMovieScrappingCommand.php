<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example2;

/**
 * Class IMDBMovieScrappingCommand
 * @package App\Behavioral\Command\Example2
 */
class IMDBMovieScrappingCommand extends WebScrappingCommand
{
    /**
     * Получить информацию о фильме с подобной страницы:
     * https://www.imdb.com/title/tt4154756/
     */
    public function parse(string $html): void
    {
        if (preg_match("|<h1 itemprop=\"name\" class=\"\">(.*?)</h1>|", $html, $matches)) {
            $title = $matches[1];
        }
        echo "IMDBMovieScrapingCommand: Parsed movie $title.\n";
    }
}