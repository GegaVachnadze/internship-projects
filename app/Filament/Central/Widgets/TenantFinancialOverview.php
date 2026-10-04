<?php

namespace App\Filament\Central\Widgets;

use App\Models\Tenant;
use App\Services\TenantFinancialOverviewService;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TenantFinancialOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $service = app(TenantFinancialOverviewService::class);

        return Tenant::query()
            ->get()
            ->map(function (Tenant $tenant) use ($service): Stat {
                $financialData = $service->getFinancialData($tenant);

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