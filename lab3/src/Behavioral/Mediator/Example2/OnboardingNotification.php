<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example2;

/**
 * Class OnboardingNotification
 * @package App\Behavioral\Mediator\Example2
 */
class OnboardingNotification implements Observer
{
    private $admin_email;

    public function __construct(string $admin_email)
    {
        $this->admin_email = $admin_email;
    }

    public function update(string $event, object $emitter, $data = null): void
    {
        echo "OnboardingNotification: The notification has been emailed!\n";
    }
}