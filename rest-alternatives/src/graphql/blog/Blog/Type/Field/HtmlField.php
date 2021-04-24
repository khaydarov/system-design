<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type\Field;

use App\graphql\blog\Blog\Type\Enum\ContentFormatEnum;
use App\graphql\blog\Types;

/**
 * Class HtmlField
 * @package App\graphql\blog
 */
class HtmlField
{
    public static function build($name, $objectKey = null)
    {
        $objectKey = $objectKey ?: $name;

        return [
            'name' => $name,
            'type' => Types::string(),
            'args' => [
                'format' => [
                    'type' => Types::contentFormatEnum(),
                    'defaultValue' => ContentFormatEnum::FORMAT_HTML
                ],
                'maxLength' => Types::int()
            ],
            'resolve' => function($object, $args) use ($objectKey) {
                $html = $object->{$objectKey};
                $text = strip_tags($html);

                if (!empty($args['maxLength'])) {
                    $safeText = mb_substr($text, 0, $args['maxLength']);
                } else {
                    $safeText = $text;
                }

                switch ($args['format']) {
                    case ContentFormatEnum::FORMAT_HTML:
                        if ($safeText !== $text) {
                            return nl2br($safeText);
                        }

                        return $html;
                    case ContentFormatEnum::FORMAT_TEXT:
                    default:
                        return $safeText;
                }
            }
        ];
    }
}