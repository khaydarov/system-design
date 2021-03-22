<?php
declare(strict_types=1);

namespace App\Behavioral\TemplateMethod;

/**
 * Class CityJourney
 * @package App\Behavioral\TemplateMethod
 */
class CityJourney extends Journey
{
    protected function enjoyVacation(): string
    {
        return 'Eat, drink, take photos and sleep';
    }

    public function buyGift()
    {
        return 'Buy a gift';
    }
}