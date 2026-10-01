<?php

namespace App\Filament\Resources\PaymentResource\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('apartment_id')
                    ->relationship('apartment', 'apartment_number')
                    ->label(__('messages.Apartment'))
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('amount')
                    ->label(__('messages.Amount'))
                    ->required()
                    ->numeric()
                    ->prefix('₾'),

                TextInput::make('month')
                    ->label(__('messages.Month'))
                    ->required()
                    ->placeholder('2026-09'),

                Toggle::make('is_paid')
                    ->label(__('messages.Status'))
                    ->default(true)
                    ->required(),
            ]);
    }
}
