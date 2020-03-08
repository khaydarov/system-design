<?php
declare(strict_types=1);

namespace App\Patterns\DomainModel;

/**
 * Class DomainObject
 * @package App\Patterns\DomainModel
 */
class DomainObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function getCollection(string $type): void {
        //...
    }
}