<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;

class LocaleListener
{
    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        $request->setLocale('ru_RU');
    }
}