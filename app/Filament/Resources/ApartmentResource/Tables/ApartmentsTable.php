<?php

namespace App\Filament\Resources\ApartmentResource\Tables;

use App\Filament\Resources\ApartmentResource;
use App\Filament\Resources\ApartmentResource\Actions\GenerateApartmentsAction;
use App\Models\Apartment;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                GenerateApartmentsAction::make(),

                Action::make('inviteResidents')
                    ->label(__('messages.invite_residents'))
                    ->icon('heroicon-o-user-plus')
                    ->modalHeading(__('messages.invite_residents'))
                    ->modalDescription(
                        __('messages.invite_residents_description')
                    )
                    ->form([
                        TextInput::make('registration_link')
                            ->label(__('messages.registration_link'))
                            ->default(
                                fn (): string => filament()->getRegistrationUrl()
                            )
                            ->readOnly()
                            ->suffixAction(
                                Action::make('copy')
                                    ->icon('heroicon-o-clipboard')
                                    ->action(
                                        function ($state, $livewire): void {
                                            $livewire->js(
                                                "navigator.clipboard.writeText(" .
                                                json_encode($state) .
                                                ")"
                                            );

                                            \Filament\Notifications\Notification::make()
                                                ->title(__('messages.link_copied'))
                                                ->success()
                                                ->send();
                                        }
                                    )
                            ),
                    ])
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel(__('messages.close')),
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