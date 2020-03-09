<?php
declare(strict_types=1);

namespace App\Accounting\Customer;

use App\Accounting\Agreement\ServiceAgreement;

class Stranger extends Customer
{
    /**
     * Stranger constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct($name);

        $agreement = new ServiceAgreement();
        $agreement->setRate(5);

        $this->setServiceAgreement($agreement);
    }
}
