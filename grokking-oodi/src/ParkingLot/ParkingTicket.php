<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class ParkingTicket
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var \DateTimeImmutable
     */
    private $issuedAt;

    /**
     * @var \DateTimeImmutable
     */
    private $payedAt;

    /**
     * @var int
     */
    private $payedAmount;

    /**
     * @var ParkingTicketStatus
     */
    private $status;

    public function __construct(
        string $number,
        \DateTimeImmutable $issuedAt,
        \DateTimeImmutable $payedAt,
        int $payedAmount,
        ParkingTicketStatus $status
    ) {
        $this->number = $number;
        $this->issuedAt = $issuedAt;
        $this->payedAt = $payedAt;
        $this->payedAmount = $payedAmount;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getIssuedAt(): \DateTimeImmutable
    {
        return $this->issuedAt;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getPayedAt(): \DateTimeImmutable
    {
        return $this->payedAt;
    }

    /**
     * @return int
     */
    public function getPayedAmount(): int
    {
        return $this->payedAmount;
    }

    /**
     * @return ParkingTicketStatus
     */
    public function getStatus(): ParkingTicketStatus
    {
        return $this->status;
    }
}