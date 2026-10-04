<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class BuildingFinanceService
{
    private static array $financialCache = [];

    public function getFinancialData(Tenant $tenant): array
    {
        $key = (string) $tenant->getKey();

        if (isset(self::$financialCache[$key])) {
            return self::$financialCache[$key];
        }

        self::$financialCache[$key] = $tenant->run(function (): array {
            $totalDue = (float) Payment::query()
                ->sum('amount');

            $collected = $this->getCollectedAmount();

            $remaining = max($totalDue - $collected, 0);

            $percentage = $totalDue > 0
                ? ($collected / $totalDue) * 100
                : 0;

            return [
                'total_due' => $totalDue,
                'collected' => $collected,
                'remaining' => $remaining,
                'percentage' => $percentage,
            ];
        });

        return self::$financialCache[$key];
    }

    private function getCollectedAmount(): float
    {
        $columns = Schema::getColumnListing('payments');

        if (in_array('is_paid', $columns, true)) {
            return (float) Payment::query()
                ->where('is_paid', true)
                ->sum('amount');
        }

        if (in_array('paid', $columns, true)) {
            return (float) Payment::query()
                ->where('paid', true)
                ->sum('amount');
        }

        if (in_array('paid_at', $columns, true)) {
            return (float) Payment::query()
                ->whereNotNull('paid_at')
                ->sum('amount');
        }

        if (in_array('status', $columns, true)) {
            return $this->sumPaidByStatus('status');
        }

        if (in_array('payment_status', $columns, true)) {
            return $this->sumPaidByStatus('payment_status');
        }

        return 0;
    }

    private function sumPaidByStatus(string $column): float
    {
        $paidStatuses = [
            'paid',
            'completed',
            'complete',
            'success',
            'successful',
        ];

        return (float) Payment::query()
            ->where(function (Builder $query) use ($column, $paidStatuses): void {
                foreach ($paidStatuses as $status) {
                    $query->orWhereRaw(
                        "LOWER(CAST(`{$column}` AS CHAR)) = ?",
                        [$status]
                    );
                }
            })
            ->sum('amount');
    }
}