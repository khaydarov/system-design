<?php

namespace App\LSB;

require_once '../../vendor/autoload.php';

/** @var User $user */
$user = User::create();
var_dump($user->iAmUser());
var_dump($user);

/** @var Document $document */
$document = Document::create();
var_dump($document->iAmDocument());
var_dump($document);