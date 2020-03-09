<?php

use App\Accounting\Customer\Friend;
use App\Accounting\Customer\Stranger;
use App\Accounting\Entry\EntryType;
use App\Accounting\Event\Usage;
use App\Accounting\PostingRule\MultiplyByRatePR;

require '../../vendor/autoload.php';

// this is stranger
$stranger = new Stranger("Nikolay");

// this is my friend
$friend = new Friend("Nazar");

$entryType = EntryType::getUsageType();

$people = [
    $stranger,
    $friend
];

$kwtUsage = 100;

foreach ($people as $person) {
    // Event happened
    $event = new Usage(
        $kwtUsage,
        new DateTime(),
        new DateTime(),
        $person
    );

    $postingRule = new MultiplyByRatePR($entryType);
    $postingRule->process($event);
}

print_r($friend->getEntries());
print_r($stranger->getEntries());
