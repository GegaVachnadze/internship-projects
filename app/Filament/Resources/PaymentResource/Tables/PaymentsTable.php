<?php

namespace App\Filament\Resources\PaymentResource\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('apartment.apartment_number')
                    ->label(__('messages.Apartment Number'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('amount')
                    ->label(__('messages.Amount'))
                    ->money('GEL')
                    ->sortable(),

                TextColumn::make('month')
                    ->label(__('messages.Month'))
                    ->searchable()
                    ->sortable(),

                IconColumn::make('is_paid')
                    ->label(__('messages.Status'))
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label(__('messages.Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
