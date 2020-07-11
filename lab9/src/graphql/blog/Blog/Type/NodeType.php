<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type;

use App\graphql\blog\Blog\Data\Image;
use App\graphql\blog\Blog\Data\Story;
use App\graphql\blog\Blog\Data\User;
use App\graphql\blog\Types;
use GraphQL\Type\Definition\InterfaceType;
use PHPUnit\Util\Exception;

/**
 * Class NodeType
 * @package App\graphql\blog\Blog\Type
 */
class NodeType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'Node',
            'fields' => [
                'id' => Types::id()
            ],
            'resolveType' => [$this, 'resolveNodeType']
        ];
        parent::__construct($config);
    }

    /**
     * @param $object
     * @return callable|\Closure|mixed
     * @throws \Exception
     */
    public function resolveNodeType($object)
    {
        if ($object instanceof User) {
            return Types::user();
        }

        if ($object instanceof Image) {
            return Types::image();
        }

        if ($object instanceof Story) {
            return Types::story();
        }

        throw new Exception('Unknown');
    }
}
