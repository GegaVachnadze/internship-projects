<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function getNavigationLabel(): string
    {
        return __('messages.Payments');
    }

    public static function getModelLabel(): string
    {
        return __('messages.Payment');
    }

    public static function getPluralModelLabel(): string
    {
        return __('messages.Payments');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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

    public static function table(Table $table): Table
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
