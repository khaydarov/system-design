<?php

declare(strict_types=1);

namespace App;

final class HeavyReportFactory implements ReportFactory
{
    public function createReport(ValueObject $value): Report
    {
        // do some heavy work
        return new Report();
    }
}