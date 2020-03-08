<?php
declare(strict_types=1);

namespace App\Behavioral\TemplateMethod;


class BeachJourney extends Journey
{
    protected function enjoyVacation(): string
    {
        return 'Swimming and sun-bathing';
    }
}