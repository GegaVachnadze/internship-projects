<?php

namespace App\Filament\Resources\MonthlyFees\Tables;

use App\Models\MonthlyFee;
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
                    ->label(__('messages.Amount'))
                    ->money('GEL')
                    ->sortable(),

                TextColumn::make('status')
                    ->label(__('messages.Status'))
                    ->badge()
                    ->getStateUsing(function (MonthlyFee $record): string {
                        return $record->is_paid
                            ? __('messages.paid')
                            : __('messages.not_paid');
                    })
                    ->color(function (MonthlyFee $record): string {
                        return $record->is_paid ? 'success' : 'danger';
                    }),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make()
                    ->label(''),

                DeleteAction::make()
                    ->label(''),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}