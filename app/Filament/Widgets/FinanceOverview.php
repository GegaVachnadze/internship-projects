<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use App\Models\MonthlyFee;
use Filament\Widgets\Widget;

class FinanceOverview extends Widget
{
    protected string $view = 'filament.widgets.finance-overview';

    protected int|string|array $columnSpan = 'full';

    /**
     * @return array<string, float>
     */
    protected function getViewData(): array
    {
        $expected = (float) MonthlyFee::query()->sum('amount');

        $collected = (float) MonthlyFee::query()
            ->with('payments')
            ->get()
            ->sum(
                fn (MonthlyFee $fee): float => (float) $fee->payments->sum('amount')
            );

        $expenses = (float) Expense::query()->sum('amount');

        $remaining = max(0, $expected - $collected);

        $collectionPercentage = $expected > 0
            ? min(100, round(($collected / $expected) * 100, 1))
            : 0;

        return [
            'expected' => $expected,
            'collected' => $collected,
            'remaining' => (float) $remaining,
            'expenses' => $expenses,
            'collectionPercentage' => (float) $collectionPercentage,
        ];
    }
}