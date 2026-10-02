<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use App\Models\MonthlyFee;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class FinanceOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $expected = MonthlyFee::sum('amount');
        $collected = MonthlyFee::with('payments')
            ->get()
            ->sum(fn ($fee) => $fee->payments->sum('amount'));

        $expenses = Expense::sum('amount');

        $remaining = max(0, $expected - $collected);

        $collectionPercentage = $expected > 0
            ? min(100, round(($collected / $expected) * 100, 2))
            : 0;

        return [
            Stat::make(__('messages.Expected'), number_format($expected, 2) . ' ₾'),

            Stat::make(__('messages.Collected'), number_format($collected, 2) . ' ₾'),

            Stat::make(__('messages.Remaining'), number_format($remaining, 2) . ' ₾'),

            Stat::make(__('messages.Expenses'), number_format($expenses, 2) . ' ₾'),

            Stat::make(__('messages.Collection %'), $collectionPercentage . '%'),
        ];
    }
}