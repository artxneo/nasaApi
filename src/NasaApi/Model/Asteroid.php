<?php

declare(strict_types=1);

namespace App\NasaApi\Model;

class Asteroid implements \JsonSerializable
{
    private \DateTimeImmutable $date;

    private int $referenceId;

    private string $name;

    private int $speed;

    public function __construct(\DateTimeImmutable $date, int $referenceId, string $name, int $speed)
    {
        $this->date = $date;
        $this->referenceId = $referenceId;
        $this->name = $name;
        $this->speed = $speed;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getReferenceId(): int
    {
        return $this->referenceId;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function jsonSerialize()
    {
        // do serialize
    }
}