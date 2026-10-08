<?php

namespace App\Filament\Resources\AnnouncementResource\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AnnouncementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('messages.Title'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('requires_payment')
                    ->label(__('messages.Payment'))
                    ->options([
                        '1' => __('messages.requires_payment'),
                        '0' => __('messages.no_payment'),
                    ]),
            ])
            ->actions([
                EditAction::make()
                    ->label(''),

                DeleteAction::make()
                    ->label(''),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}