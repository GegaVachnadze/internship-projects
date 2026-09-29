<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Models\Expense;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('messages.Title'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('amount')
                    ->label(__('messages.Amount'))
                    ->money('GEL')
                    ->sortable(),
                TextColumn::make('expense_date')
                    ->label(__('messages.Date'))
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
