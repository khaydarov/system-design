<?php

namespace App\Twirp\Src\Twirp;

use Twirp\Example\Haberdasher\Hat;
use Twirp\Example\Haberdasher\Size;
use Twirp\Example\Haberdasher\Haberdasher as HaberdasherInterface;

class Haberdasher implements HaberdasherInterface
{
    private $colors = [
        'red',
        'blue',
        'brown'
    ];

    private $hats = [
        'crown',
        'fedor'
    ];

    /**
     * @param array $ctx
     * @param Size $size
     * @return Hat
     */
    public function MakeHat(array $ctx, Size $size): Hat
    {
        $hat = new Hat();
        $hat->setInches($size->getInches());
        $hat->setColor($this->colors[rand(0, 2)]);
        $hat->setName($this->hats[rand(0, 1)]);

        return $hat;
    }
}