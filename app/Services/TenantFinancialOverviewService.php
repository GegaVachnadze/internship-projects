<?php

namespace App\Services;

use App\DTOs\TenantFinancialOverviewData;
use App\Models\MonthlyFee;
use App\Models\Payment;
use App\Models\Tenant;

class TenantFinancialOverviewService
{
    public function getFinancialData(Tenant $tenant): TenantFinancialOverviewData
    {
        return $tenant->run(function (): TenantFinancialOverviewData {
            $expected = (float) MonthlyFee::sum('amount');

            $collected = (float) Payment::query()
                ->where('is_paid', true)
                ->sum('amount');

            $percentage = $expected > 0
                ? round(($collected / $expected) * 100, 1)
                : 0;

            return new TenantFinancialOverviewData(
                expected: $expected,
                collected: $collected,
                percentage: $percentage,
            );
        });
    }
}