<?php

namespace App\Filament\Resources\ExpenseResource\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__('messages.Title'))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('amount')
                    ->label(__('messages.Amount'))
                    ->required()
                    ->numeric()
                    ->prefix('₾'),

                DatePicker::make('expense_date')
                    ->label(__('messages.Date'))
                    ->default(now()),

                Textarea::make('description')
                    ->label(__('messages.Description'))
                    ->columnSpanFull(),
            ]);
    }
}
