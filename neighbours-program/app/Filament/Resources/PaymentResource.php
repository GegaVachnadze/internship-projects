<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('apartment_id')
                    ->relationship('apartment', 'apartment_number')
                    ->label('ბინა')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('amount')
                    ->label('თანხა (₾)')
                    ->required()
                    ->numeric()
                    ->prefix('₾'),
                Forms\Components\TextInput::make('month')
                    ->label('თვე (მაგ: 2026-09)')
                    ->required()
                    ->placeholder('2026-09'),
                Forms\Components\Toggle::make('is_paid')
                    ->label('გადახდილია')
                    ->default(true)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('apartment.apartment_number')
                    ->label('ბინის ნომერი')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label('თანხა')
                    ->money('GEL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('month')
                    ->label('თვე')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->label('სტატუსი')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('ჩაწერა')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
