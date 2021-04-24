<?php

class Foo
{
    public function demo1($data = ''): string
    {
        return sprintf('This is Foo::demo1. Request parameters returned: %s', $data);
    }

    public function demo2($data = ''): string
    {
        return sprintf('This is Foo::demo2. Request parameters returned: %s', $data);
    }
}