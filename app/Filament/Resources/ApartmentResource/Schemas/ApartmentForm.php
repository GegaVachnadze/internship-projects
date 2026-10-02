<?php

namespace App\Filament\Resources\ApartmentResource\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('apartment_number')
                    ->label(__('messages.Apartment Number'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('floor')
                    ->label(__('messages.Floor'))
                    ->numeric(),

                Select::make('neighborhood_id')
                    ->relationship('neighborhood', 'name')
                    ->label(__('messages.Neighborhood'))
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }
}