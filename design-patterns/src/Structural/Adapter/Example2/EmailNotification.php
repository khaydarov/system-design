<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example2;


class EmailNotification implements NotificationInterface
{
    /**
     * @var string
     */
    private $admin_email;

    public function __construct(string $admin_email)
    {
        $this->admin_email = $admin_email;
    }

    public function send(string $title, string $message): void
    {
        echo "Sent email with title '$title' to '{$this->admin_email}' that says '$message'.";
    }
}