<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Data;

/**
 * Class Image
 * @package App\graphql\blog\Blog\Data
 */
class Image
{
    const TYPE_USERPIC = 'userpic';

    const SIZE_ICON = 'icon';
    const SIZE_SMALL = 'small';
    const SIZE_MEDIUM = 'medium';
    const SIZE_ORIGINAL = 'original';

    /**
     * @var string
     */
    public $uuid;

    /**
     * @var int
     */
    public $width;

    /**
     * @var int
     */
    public $height;

    /**
     * Image constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->uuid = $data['uuid'];
        $this->width = $data['width'];
        $this->height = $data['height'];
    }
}