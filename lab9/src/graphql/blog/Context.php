<?php
declare(strict_types=1);

namespace App\graphql\blog;

use App\graphql\blog\Blog\Data\User;

/**
 * Class Context
 * @package App\graphql\blog\Blog
 */
class Context
{
    /**
     * @var string
     */
    public $roolUrl;

    /**
     * @var User
     */
    public $viewer;

    /**
     * @var mixed
     */
    public $request;
}
