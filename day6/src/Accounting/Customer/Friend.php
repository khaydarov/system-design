<?php
declare(strict_types=1);

namespace App\Accounting\Customer;

use App\Accounting\Agreement\ServiceAgreement;

class Friend extends Customer
{
    public function __construct(string $name)
    {
        parent::__construct($name);

        $agreement = new ServiceAgreement();
        $agreement->setRate(1);

        $this->setServiceAgreement($agreement);
    }
}