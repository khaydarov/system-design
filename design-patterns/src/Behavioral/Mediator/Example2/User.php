<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example2;

/**
 * Class User
 * @package App\Behavioral\Mediator\Example2
 */
class User
{
    public $attributes = [];

    public function update($data): void
    {
        $this->attributes = array_merge($this->attributes, $data);
    }

    public function delete(): void
    {
        echo "User: I can now delete myself without worrying about the repository.\n";
    }
}