<?php

declare(strict_types=1);

namespace App;

final class InMemoryCachingReportFactory implements ReportFactory
{
    private $factory;
    private $reports;

    public function __construct(HeavyReportFactory $factory)
    {
        $this->factory = $factory;
        $this->reports = new \SplObjectStorage();
    }

    public function createReport(ValueObject $value): Report
    {
        $this->collectGarbage();
        return $this->reports[\WeakReference::create($value)] ??= $this->factory->createReport($value);
    }

    private function collectGarbage(): void
    {
        /** @var \WeakReference $report */
        foreach ($this->reports as $report) {
            if ($report->get() === null) {
                $this->reports->detach($report);
            }
        }
    }
}