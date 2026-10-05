<?php

namespace App\Filament\Resources\ApartmentResource\Tables;

use App\Filament\Resources\ApartmentResource;
use App\Filament\Resources\ApartmentResource\Actions\GenerateApartmentsAction;
use App\Models\Apartment;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                GenerateApartmentsAction::make(),
            ])
            ->query(
                ApartmentResource::getEloquentQuery()
                    ->whereIn(
                        'apartments.id',
                        Apartment::query()
                            ->selectRaw('MIN(id)')
                            ->groupBy('floor')
                    )
                    ->select('apartments.*')
                    ->selectSub(
                        Apartment::query()
                            ->from('apartments as floor_apartments')
                            ->selectRaw('COUNT(*)')
                            ->whereColumn(
                                'floor_apartments.floor',
                                'apartments.floor'
                            ),
                        'apartments_count'
                    )
            )
            ->columns([
                TextColumn::make('floor')
                    ->label(__('messages.Floor'))
                    ->numeric()
                    ->sortable(),

                TextColumn::make('apartments_count')
                    ->label(__('messages.apartment_count'))
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                Action::make('manage')
                    ->label(__('messages.manage_apartments'))
                    ->icon('heroicon-o-building-office-2')
                    ->url(
                        fn (Apartment $record): string => ApartmentResource::getUrl(
                            'manage',
                            [
                                'floor' => $record->floor,
                            ]
                        )
                    ),
            ])
            ->toolbarActions([]);
    }
}