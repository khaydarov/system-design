<?php
declare(strict_types=1);

namespace App\graphql\blog;

use App\graphql\blog\Blog\Type\CommentType;
use App\graphql\blog\Blog\Type\Enum\ContentFormatEnum;
use App\graphql\blog\Blog\Type\Enum\ImageSizeEnum;
use App\graphql\blog\Blog\Type\Field\HtmlField;
use App\graphql\blog\Blog\Type\ImageType;
use App\graphql\blog\Blog\Type\NodeType;
use App\graphql\blog\Blog\Type\Scalar\UrlType;
use App\graphql\blog\Blog\Type\StoryType;
use App\graphql\blog\Blog\Type\UserType;
use GraphQL\Type\Definition\ListOfType;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\ScalarType;
use GraphQL\Type\Definition\Type;

class Types
{
    /**
     * @var array
     */
    private static $types = [];

    /**
     * @var boolean
     */
    private const LAZY_LOAD_GRAPHQL_TYPES = true;

    /**
     * @return callable
     * @throws \Exception
     */
    public static function user()
    {
        return static::get(UserType::class);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function story()
    {
        return static::get(StoryType::class);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function comment()
    {
        return static::get(CommentType::class);
    }

    /**
     * @return \Closure|mixed
     * @throws \Exception
     */
    public static function image()
    {
        return static::get(ImageType::class);
    }

    /**
     * @return \Closure|mixed
     * @throws \Exception
     */
    public static function imageSizeEnum()
    {
        return static::get(ImageSizeEnum::class);
    }

    /**
     * @return \Closure|mixed
     * @throws \Exception
     */
    public static function contentFormatEnum()
    {
        return static::get(ContentFormatEnum::class);
    }

    /**
     * @return \Closure|mixed
     * @throws \Exception
     */
    public static function node()
    {
        return static::get(NodeType::class);
    }

    /**
     * @return \Closure|mixed
     * @throws \Exception
     */
    public static function url()
    {
        return static::get(UrlType::class);
    }

    /**
     * @param string $className
     * @return mixed
     * @throws \Exception
     */
    public static function get(string $className)
    {
        if (self::LAZY_LOAD_GRAPHQL_TYPES) {
            return function () use ($className) {
                return static::byClassName($className);
            };
        }
        return static::byClassName($className);
    }

    /**
     * @param string $className
     * @return mixed
     * @throws \Exception
     */
    public static function byClassName(string $className)
    {
        $parts = explode("\\", $className);
        $cacheName = strtolower(preg_replace('~Type$~', '', $parts[count($parts) - 1]));
        $type = null;

        if (!isset(self::$types[$cacheName])) {
            if (class_exists($className)) {
                $type = new $className();
            }

            self::$types[$cacheName] = $type;
        }

        $type = self::$types[$cacheName];

        if (!$type) {
            throw new \Exception("Unknown graphql type: " . $className);
        }

        return $type;
    }

    /**
     * @param $name
     * @param null $objectKey
     */
    public static function htmlField($name, $objectKey = null)
    {
        return HtmlField::build($name, $objectKey);
    }

    public static function boolean(): ScalarType
    {
        return Type::boolean();
    }

    public static function float(): ScalarType
    {
        return Type::float();
    }

    public static function id(): ScalarType
    {
        return Type::id();
    }

    public static function int(): ScalarType
    {
        return Type::int();
    }

    public static function string(): ScalarType
    {
        return Type::string();
    }

    public static function nonNull(Type $type): NonNull
    {
        return new NonNull($type);
    }

    public static function listOf($type): ListOfType
    {
        return new ListOfType($type);
    }
}
