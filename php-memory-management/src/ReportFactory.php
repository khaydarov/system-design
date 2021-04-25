<?php

declare(strict_types=1);

namespace App;

interface ReportFactory
{
    public function createReport(ValueObject $value): Report;
}