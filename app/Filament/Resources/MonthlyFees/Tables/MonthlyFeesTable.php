<?php

namespace App\Filament\Resources\MonthlyFees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MonthlyFeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('apartment.apartment_number')
                    ->label(__('messages.Apartment Number'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('month')
                    ->label(__('messages.Month'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('amount')
                    ->label(__('messages.Expected'))
                    ->money('GEL')
                    ->sortable(),

                TextColumn::make('payments_sum_amount')
                    ->label(__('messages.Collected'))
                    ->money('GEL')
                    ->sum('payments', 'amount')
                    ->sortable(),

                TextColumn::make('remaining')
                    ->label(__('messages.Remaining'))
                    ->money('GEL')
                    ->getStateUsing(function ($record) {
                        return max(
                            0,
                            $record->amount - $record->payments->sum('amount')
                        );
                    }),

                TextColumn::make('collection_percentage')
                    ->label(__('messages.Collection %'))
                    ->suffix('%')
                    ->getStateUsing(function ($record) {
                        if ($record->amount <= 0) {
                            return 0;
                        }

                        return min(
                            100,
                            round(
                                ($record->payments->sum('amount') / $record->amount) * 100,
                                2
                            )
                        );
                    }),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}