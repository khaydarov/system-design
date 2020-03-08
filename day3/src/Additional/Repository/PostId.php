<?php
declare(strict_types=1);

namespace App\Additional\Repository;

/**
 * Class PostId
 * @package App\Additional\Repository
 */
class PostId
{
    /**
     * @var int
     */
    private $id;

    /**
     * @param int $id
     * @return PostId
     */
    public static function fromInt(int $id)
    {
        self::ensureIsValid($id);

        return new self($id);
    }

    /**
     * PostId constructor.
     * @param int $id
     */
    private function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function toInt(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private static function ensureIsValid(int $id)
    {
        if ($id <= 0) {
            throw new \InvalidArgumentException('Invalid PostId given');
        }
    }
}