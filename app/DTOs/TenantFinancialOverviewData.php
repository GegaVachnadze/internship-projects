<?php

namespace App\DTOs;

readonly class TenantFinancialOverviewData
{
    public function __construct(
        public float $expected,
        public float $collected,
        public float $percentage,
    ) {}
}