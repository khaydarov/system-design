<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

interface EntryViewRepository
{
    public function getEntryWithComments();
}