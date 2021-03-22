<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example2;


class SlackNotificationAdapter implements NotificationInterface
{
    /**
     * @var SlackApi
     */
    private $slack;

    /**
     * @var string
     */
    private $chat_id;

    public function __construct(SlackApi $slack, string $chat_id)
    {
        $this->slack = $slack;
        $this->chat_id = $chat_id;
    }

    public function send(string $title, string $message): void
    {
        $slack_message = "#" . $title . "# " . strip_tags($message);
        $this->slack->logIn();
        $this->slack->sendMessage($this->chat_id, $slack_message);
    }
}