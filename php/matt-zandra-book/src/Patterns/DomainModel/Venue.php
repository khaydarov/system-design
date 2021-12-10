<?php
declare(strict_types=1);

namespace App\Patterns\DomainModel;

/**
 * Class Venue
 * @package App\Patterns\DomainModel
 */
class Venue extends DomainObject
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var array
     */
    private array $spaces;

    public function __construct(int $id, string $name)
    {
        $this->name = $name;
        $this->spaces = []; //..
        parent::__construct($id);
    }
}