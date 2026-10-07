<?php

namespace App\Filament\Resources\MonthlyFees;

use App\Filament\Resources\MonthlyFees\Pages\CreateMonthlyFee;
use App\Filament\Resources\MonthlyFees\Pages\EditMonthlyFee;
use App\Filament\Resources\MonthlyFees\Pages\ListMonthlyFees;
use App\Filament\Resources\MonthlyFees\Schemas\MonthlyFeeForm;
use App\Filament\Resources\MonthlyFees\Tables\MonthlyFeesTable;
use App\Models\MonthlyFee;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MonthlyFeeResource extends Resource
{
    protected static ?string $model = MonthlyFee::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function getNavigationLabel(): string
    {
        return __('messages.Monthly Fees');
    }

    public static function getModelLabel(): string
    {
        return __('messages.Monthly Fee');
    }

    public static function getPluralModelLabel(): string
    {
        return __('messages.Monthly Fees');
    }

    public static function form(Schema $schema): Schema
    {
        return MonthlyFeeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MonthlyFeesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMonthlyFees::route('/'),
            'create' => CreateMonthlyFee::route('/create'),
            'edit' => EditMonthlyFee::route('/{record}/edit'),
        ];
    }
}