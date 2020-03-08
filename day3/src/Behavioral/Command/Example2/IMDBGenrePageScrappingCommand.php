<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example2;

/**
 * Class IMDBGenrePageScrappingCommand
 * @package App\Behavioral\Command\Example2
 */
class IMDBGenrePageScrappingCommand extends WebScrappingCommand
{
    /**
     * @var int
     */
    private $page;

    public function __construct(string $url, int $page = 1)
    {
        parent::__construct($url);
        $this->page = 1;
    }

    public function getURL(): string
    {
        return $this->url . '?page=' . $this->page;
    }

    /**
     * Извлечение всех фильмов со страницы вроде этой:
     * https://www.imdb.com/search/title?genres=sci-fi&explore=title_type,genres
     */
    public function parse(string $html): void
    {
        preg_match_all("|href=\"(/title/.*?/)\?ref_=adv_li_tt\"|", $html, $matches);
        echo "IMDBGenrePageScrapingCommand: Discovered " . count($matches[1]) . " movies.\n";

        foreach ($matches[1] as $moviePath) {
            $url = "https://www.imdb.com" . $moviePath;
            Queue::get()->add(new IMDBMovieScrappingCommand($url));
        }

        // Извлечение URL следующей страницы.
        if (preg_match("|Next &#187;</a>|", $html)) {
            Queue::get()->add(new IMDBGenrePageScrappingCommand($this->url, $this->page + 1));
        }
    }
}