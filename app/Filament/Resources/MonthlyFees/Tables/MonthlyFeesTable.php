<?php

namespace App\Filament\Resources\MonthlyFees\Tables;

use App\Models\MonthlyFee;
use Filament\Actions\Action;
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
                Action::make('markAsPaid')
                    ->label(function (MonthlyFee $record): string {
                        return $record->is_paid
                            ? __('messages.paid')
                            : __('messages.mark_as_paid');
                    })
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn (MonthlyFee $record): bool => ! $record->is_paid)
                    ->action(function (MonthlyFee $record): void {
                        $record->update([
                            'is_paid' => true,
                        ]);
                    }),

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