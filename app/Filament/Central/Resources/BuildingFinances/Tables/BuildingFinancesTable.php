<?php

namespace App\Filament\Central\Resources\BuildingFinances\Tables;

use App\Models\Tenant;
use App\Services\BuildingFinanceService;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BuildingFinancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('messages.building'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_due')
                    ->label(__('messages.total_due'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                app(BuildingFinanceService::class)
                                    ->getFinancialData($record)['total_due'],
                                2
                            ) . ' ₾'
                    ),

                TextColumn::make('collected')
                    ->label(__('messages.collected'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                app(BuildingFinanceService::class)
                                    ->getFinancialData($record)['collected'],
                                2
                            ) . ' ₾'
                    ),

                TextColumn::make('remaining')
                    ->label(__('messages.remaining'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                app(BuildingFinanceService::class)
                                    ->getFinancialData($record)['remaining'],
                                2
                            ) . ' ₾'
                    ),

                TextColumn::make('collection_percentage')
                    ->label(__('messages.collection_percentage'))
                    ->state(
                        fn (Tenant $record): string =>
                            number_format(
                                app(BuildingFinanceService::class)
                                    ->getFinancialData($record)['percentage'],
                                1
                            ) . '%'
                    )
                    ->badge(),
            ])
            ->defaultSort('id');
    }
}