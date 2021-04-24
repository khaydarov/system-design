<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type\Enum;

use App\graphql\blog\Blog\Data\Image;
use GraphQL\Type\Definition\EnumType;

/**
 * Class ImageSizeEnum
 * @package App\graphql\blog\Blog\Type\Enum
 */
class ImageSizeEnum extends EnumType
{
    public const SIZE_ICON = 'ICON';
    public const SIZE_SMALL = 'SMALL';
    public const SIZE_MEDIUM = 'MEDIUM';
    public const SIZE_ORIGINAL = 'ORIGINAL';

    public function __construct()
    {
        $config = [
            'values' => [
                self::SIZE_ICON => Image::SIZE_ICON,
                self::SIZE_SMALL => Image::SIZE_SMALL,
                self::SIZE_MEDIUM => Image::SIZE_MEDIUM,
                self::SIZE_ORIGINAL => Image::SIZE_ORIGINAL
            ]
        ];
        parent::__construct($config);
    }
}