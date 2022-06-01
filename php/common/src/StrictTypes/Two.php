<?php

//declare(strict_types=1);

namespace Khaydarovm\Common\StrictTypes;

class Two
{
    public function doWorkTwo()
    {
        $one = new One();
        $a = $one->doWorkOne("10");

        return $a;
    }
}
