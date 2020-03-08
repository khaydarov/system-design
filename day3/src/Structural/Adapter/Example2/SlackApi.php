<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example2;

class SlackApi
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $api_key;

    public function __construct(string $login, string $api_key)
    {
        $this->login = $login;
        $this->api_key = $api_key;
    }

    public function logIn(): void
    {
        echo "Logged in to a slack account '{$this->login}'.\n";
    }

    public function sendMessage(string $chatId, string $message): void
    {
        echo "Posted following message into the '$chatId' chat: '$message'.\n";
    }
}