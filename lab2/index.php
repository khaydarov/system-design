<?php

use App\Accounts\Account;
use App\PaymentsProcessor\PaymentsProcessor;
use App\Exceptions\PaymentException;

require_once 'vendor/autoload.php';

$payment_processor = new PaymentsProcessor();

$murod = new Account();
$murod->increase(1000);

$nazar = new Account();
$nazar->increase(300);

try {
    $payment_order = $payment_processor->createPaymentOrder($murod, $nazar, 300, 'RUB');
    $payment_processor
        ->approvePaymentOrder($payment_order)
        ->acceptPaymentOrder($payment_order);
} catch (PaymentException $e) {
    var_dump(sprintf("[Error]: %s", $e->getMessage()));
    die;
}

var_dump($murod->getBalance());
var_dump($nazar->getBalance());

try {
    $another_payment_order = $payment_processor->createPaymentOrder($nazar, $murod, 500, 'RUB');
    $payment_processor
        ->rejectPaymentOrder($another_payment_order);
} catch (PaymentException $e) {
    var_dump(sprintf("[Error]: %s", $e->getMessage()));
    die;
}

var_dump($murod->getBalance());
var_dump($nazar->getBalance());
die;