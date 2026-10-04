<?php

namespace App\DTOs;

readonly class BuildingFinanceData
{
    public function __construct(
        public float $totalDue,
        public float $collected,
        public float $remaining,
        public float $percentage,
    ) {}
}