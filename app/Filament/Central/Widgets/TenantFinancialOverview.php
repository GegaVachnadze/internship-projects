<?php

namespace App\Filament\Central\Widgets;

use App\DTOs\TenantFinancialOverviewData;
use App\Models\MonthlyFee;
use App\Models\Payment;
use App\Models\Tenant;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TenantFinancialOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return Tenant::query()
            ->get()
            ->map(function (Tenant $tenant): Stat {
                $financialData = $tenant->run(
                    function (): TenantFinancialOverviewData {
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
                    }
                );

                return Stat::make(
                    $tenant->id,
                    $financialData->percentage . '%'
                )
                    ->description(
                        __('messages.collection_progress')
                        . ': '
                        . number_format($financialData->collected, 2)
                        . ' ₾ / '
                        . number_format($financialData->expected, 2)
                        . ' ₾'
                    )
                    ->icon('heroicon-o-chart-bar');
            })
            ->all();
    }
}