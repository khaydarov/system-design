<?php
declare(strict_types=1);

namespace App\Behavioral\TemplateMethod;

abstract class Journey
{
    /**
     * @var string[]
     */
    private $things_todo = [];

    final public function takeATrip()
    {
        $this->things_todo[] = $this->buyAFlight();
        $this->things_todo[] = $this->takePlane();
        $this->things_todo[] = $this->enjoyVacation();

        $buy_gift = $this->buyGift();

        if ($buy_gift !== null) {
            $this->things_todo[] = $buy_gift;
        }

        $this->things_todo[] = $this->takePlane();
    }

    abstract protected function enjoyVacation(): string;

    protected function buyGift()
    {
        return null;
    }

    private function buyAFlight(): string
    {
        return 'Buy a flight ticket';
    }

    private function takePlane(): string
    {
        return 'Taking the plane';
    }

    /**
     * @return string[]
     */
    public function getThingsTodo(): array
    {
        return $this->things_todo;
    }
}