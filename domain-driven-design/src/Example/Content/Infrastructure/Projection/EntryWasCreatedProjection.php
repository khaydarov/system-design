<?php

declare(strict_types=1);

namespace App\Example\Content\Infrastructure\Projection;

use App\Example\Content\Domain\Model\Entry\EntryWasCreated;

class EntryWasCreatedProjection implements Projection
{
    public function listen(): string
    {
        return EntryWasCreated::class;
    }

    /**
     * @param EntryWasCreated $event
     */
    public function handle($event)
    {
        dd($event);
    }
}