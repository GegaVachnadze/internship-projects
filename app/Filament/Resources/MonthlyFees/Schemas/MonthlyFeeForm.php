<?php

namespace App\Filament\Resources\MonthlyFees\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MonthlyFeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('apartment_id')
                    ->relationship('apartment', 'apartment_number')
                    ->label(__('messages.Apartment Number'))
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('month')
                    ->required(),
            ]);
    }
}
