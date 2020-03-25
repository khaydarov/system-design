<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example2;

/**
 * Class ThrottlingMiddleware
 * @package App\Behavioral\ChainOfResponsibilities\Example2
 */
class ThrottlingMiddleware extends Middleware
{
    /**
     * @var int
     */
    private $request_per_minute;

    /**
     * @var int
     */
    private $request;

    /**
     * @var int
     */
    private $current_time;

    public function __construct(int $request_per_minute)
    {
        $this->request_per_minute = $request_per_minute;
        $this->current_time = time();
    }

    public function check(string $email, string $password): bool
    {
        if (time() > $this->current_time + 60) {
            $this->request = 0;
            $this->current_time = time();
        }

        $this->request++;

        if ($this->request > $this->request_per_minute) {
            echo "ThrottlingMiddleware: Request limit exceeded!\n";

            die;
        }

        return parent::check($email, $password);
    }
}