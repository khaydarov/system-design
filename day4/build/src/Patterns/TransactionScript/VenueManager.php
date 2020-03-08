<?php
declare(strict_types=1);

namespace App\Patterns\TransactionScript;

/**
 * Class VenueManager
 * @package App\Patterns\TransactionScript
 */
class VenueManager extends Base
{
    /**
     * @var string
     */
    private $addVenue = 'INSERT INTO venue (name) VALUES(?)';

    /**
     * @var string
     */
    private $addSpace = '...';

    /**
     * @var string
     */
    private $addEvent = '';

    /**
     * @param string $name
     * @param array $spaces
     * @return array
     */
    public function addVenue(string $name, array $spaces): array
    {
        // ...
        return [];
    }
}