<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type;


use App\graphql\blog\Blog\Data\Image;
use App\graphql\blog\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class ImageType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Image',
            'description' => 'Image data',
            'fields' => [
                'uuid' => Types::id(),
                'width' => Types::int(),
                'height' => Types::int(),
                'url' => [
                    'type' => Types::url(),
                    'resolve' => [$this, 'resolveUrl']
                ]
            ],
            'resolveField' => function($image, $args, $context, ResolveInfo $info) {
                return $image->{$info->fieldName};
            }
        ];

        parent::__construct($config);
    }

    public function resolveUrl(Image $image, $args)
    {
        return 'https://image.com/resize/' . $image->width;
    }
}