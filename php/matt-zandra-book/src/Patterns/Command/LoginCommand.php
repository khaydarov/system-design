<?php
declare(strict_types=1);

namespace App\Patterns\Command;

/**
 * Class LoginCommand
 * @package App\Patterns\Command
 */
class LoginCommand extends Command
{
    public function execute(CommandContext $context): bool
    {
        $manager = ''; //Registry::getAceessManager();
        $user = $context->get('username');
        $password = $context->get('password');

        $userObj = null; //$manager->login($user, $password);

        if ($userObj === null) {
            $context->setError('$manager->getError()');
            return false;
        }

        $context->addParam('user', $userObj);
        return true;
    }
}