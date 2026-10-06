<?php

namespace App\Filament\Resources\AnnouncementResource\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnnouncementForm
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

                RichEditor::make('body')
                    ->label(__('messages.Description'))
                    ->required()
                    ->columnSpanFull(),

                Toggle::make('requires_payment')
                    ->label(__('messages.requires_payment'))
                    ->helperText(
                        __('messages.requires_payment_description')
                    )
                    ->default(false)
                    ->live(),

                TextInput::make('payment_amount')
                    ->label(__('messages.payment_amount'))
                    ->numeric()
                    ->minValue(0.01)
                    ->step(0.01)
                    ->required(fn (callable $get): bool => (bool) $get('requires_payment'))
                    ->visible(fn (callable $get): bool => (bool) $get('requires_payment')),
            ]);
    }
}