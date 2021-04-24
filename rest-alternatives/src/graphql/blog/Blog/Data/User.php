<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Data;

/**
 * Class User
 * @package App\graphql\blog\Blog\Data
 */
class User
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var array
     */
    public $photo;

    /**
     * User constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->photo = $data['photo'];
    }
}
