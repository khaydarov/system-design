<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type\Scalar;

use GraphQL\Language\AST\Node;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\ScalarType;
use PHPUnit\Util\Exception;

/**
 * Class UrlType
 * @package App\graphql\blog\Blog\Type\Scalar
 */
class UrlType extends ScalarType
{
    /**
     * @param mixed $value
     * @return mixed
     */
    public function serialize($value)
    {
        return $value;
    }

    /**
     * @param mixed $value
     * @return mixed|string
     */
    public function parseValue($value)
    {
        if (!is_string($value) || !filter_var($value, FILTER_VALIDATE_URL)) {
            throw new Exception('parse value error');
        }

        return $value;
    }

    public function parseLiteral(Node $valueNode, ?array $variables = null)
    {
        if (!($valueNode instanceof StringValueNode)) {
            throw new Exception('parse literal error');
        }

        if (!is_string($valueNode->value) || !filter_var($valueNode->value, FILTER_VALIDATE_URL)) {
            throw new Exception('parse literal error');
        }

        return $valueNode->value;
    }
}
