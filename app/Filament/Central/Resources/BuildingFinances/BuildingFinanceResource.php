<?php

namespace App\Filament\Central\Resources\BuildingFinances;

use App\Filament\Central\Resources\BuildingFinances\Pages\ListBuildingFinances;
use App\Filament\Central\Resources\BuildingFinances\Tables\BuildingFinancesTable;
use App\Models\Tenant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BuildingFinanceResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function getNavigationLabel(): string
    {
        return __('messages.finances');
    }

    public static function getModelLabel(): string
    {
        return __('messages.finances');
    }

    public static function getPluralModelLabel(): string
    {
        return __('messages.finances');
    }

    public static function table(Table $table): Table
    {
        return BuildingFinancesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBuildingFinances::route('/'),
        ];
    }

    public static function canAccess(): bool
    {
        return (bool) auth()->user()?->is_super_admin;
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }
}