<?php

namespace App\Filament\Resources\ExpenseResource\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExpensesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('messages.Title'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('amount')
                    ->label(__('messages.Amount'))
                    ->money('GEL')
                    ->sortable(),

                TextColumn::make('expense_date')
                    ->label(__('messages.Date'))
                    ->date()
                    ->sortable(),

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
