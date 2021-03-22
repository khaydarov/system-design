<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type\Enum;

use GraphQL\Type\Definition\EnumType;

/**
 * Class ContentFormatEnum
 * @package App\graphql\blog\Blog\Type\Enum
 */
class ContentFormatEnum extends EnumType
{
    public const FORMAT_TEXT = 'TEXT';
    public const FORMAT_HTML = 'HTML';

    /**
     * ContentFormatEnum constructor.
     */
    public function __construct()
    {
        $config = [
            'name' => 'ContentFormatEnum',
            'values' => [self::FORMAT_TEXT, self::FORMAT_HTML]
        ];

        parent::__construct($config);
    }
}