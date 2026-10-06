<?php

namespace App\Filament\Resources\MonthlyFees\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MonthlyFeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('amount')
                    ->label(__('messages.Amount'))
                    ->required()
                    ->numeric(),

                TextInput::make('month')
                    ->label(__('messages.Month'))
                    ->required(),
            ]);
    }
}