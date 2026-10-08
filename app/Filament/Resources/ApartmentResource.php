<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentResource\Pages;
use App\Filament\Resources\ApartmentResource\Schemas\ApartmentForm;
use App\Filament\Resources\ApartmentResource\Tables\ApartmentsTable;
use App\Models\Apartment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ApartmentResource extends Resource
{
    protected static ?string $model = Apartment::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home';

    protected static bool $hasTitleCaseModelLabel = false;

    public static function getNavigationLabel(): string
    {
        return __('messages.Apartments');
    }

    public static function getModelLabel(): string
    {
        return __('messages.Apartment');
    }

    public static function getPluralModelLabel(): string
    {
        return __('messages.Apartment');
    }

    public static function form(Schema $schema): Schema
    {
        return ApartmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ApartmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

   public static function getPages(): array
    {
        return [
        'index' => Pages\ListApartments::route('/'),
        'create' => Pages\CreateApartment::route('/create'),
        'edit' => Pages\EditApartment::route('/{record}/edit'),
        'manage' => Pages\ManageApartments::route('/floor/{floor}'),
        ];
    }
}
