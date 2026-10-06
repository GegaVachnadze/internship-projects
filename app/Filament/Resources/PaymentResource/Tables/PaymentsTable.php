<?php

declare(strict_types=1);

namespace App\Filament\Resources\PaymentResource\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label(__('messages.resident'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('announcement.title')
                    ->label(__('messages.announcement'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('bank')
                    ->label(__('messages.bank'))
                    ->formatStateUsing(
                        fn (?string $state): string => match ($state) {
                            'tbc' => __('messages.tbc_bank'),
                            'bog' => __('messages.bog_bank'),
                            default => '-',
                        }
                    ),

                TextColumn::make('amount')
                    ->label(__('messages.Amount'))
                    ->money('GEL')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('messages.date'))
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}