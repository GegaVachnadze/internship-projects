<?php

namespace App\Filament\Central\Resources\BuildingFinances\Tables;

use App\Models\Payment;
use App\Models\Tenant;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class BuildingFinancesTable
{
    private static array $financialCache = [];

    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('messages.finances'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_due')
                    ->label(__('messages.total_due'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                self::getFinancialData($record)['total_due'],
                                2
                            ) . ' ₾'
                    ),

                TextColumn::make('collected')
                    ->label(__('messages.collected'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                self::getFinancialData($record)['collected'],
                                2
                            ) . ' ₾'
                    ),

                TextColumn::make('remaining')
                    ->label(__('messages.remaining'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                self::getFinancialData($record)['remaining'],
                                2
                            ) . ' ₾'
                    ),

                TextColumn::make('collection_percentage')
                    ->label(__('messages.collection_percentage'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                self::getFinancialData($record)['percentage'],
                                1
                            ) . '%'
                    )
                    ->badge(),
            ])
            ->defaultSort('id');
    }

    private static function getFinancialData(Tenant $tenant): array
    {
        $key = (string) $tenant->getKey();

        if (isset(self::$financialCache[$key])) {
            return self::$financialCache[$key];
        }

        self::$financialCache[$key] = $tenant->run(function (): array {
            $totalDue = (float) Payment::query()
                ->sum('amount');

            $collected = self::getCollectedAmount();

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

    private static function getCollectedAmount(): float
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
            return (float) self::sumPaidByStatus('status');
        }

        if (in_array('payment_status', $columns, true)) {
            return (float) self::sumPaidByStatus('payment_status');
        }

        return 0;
    }

    private static function sumPaidByStatus(string $column): float
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