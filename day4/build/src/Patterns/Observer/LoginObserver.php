<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

/**
 * Class LoginObserver
 * @package App\Patterns\Observer
 */
abstract class LoginObserver implements Observer
{
    /**
     * @var Login
     */
    private $login;

    public function __construct(Login $login)
    {
        $this->login = $login;
        $login->attach($this);
    }

    public function update(Observable $observable)
    {
        if ($observable === $this->login) {
            $this->doUpdate($observable);
        }
    }

    abstract public function doUpdate(Login $login);
}