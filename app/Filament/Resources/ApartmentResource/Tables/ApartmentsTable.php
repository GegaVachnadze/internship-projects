<?php

namespace App\Filament\Resources\ApartmentResource\Tables;

use App\Filament\Resources\ApartmentResource;
use App\Filament\Resources\ApartmentResource\Actions\GenerateApartmentsAction;
use App\Filament\Resources\ApartmentResource\Actions\GenerateFloorsAction;
use App\Models\Apartment;
use App\Models\Floor;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApartmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                GenerateFloorsAction::make(),

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
                                        function (
                                            mixed $state,
                                            mixed $livewire
                                        ): void {
                                            $livewire->js(
                                                'navigator.clipboard.writeText(' .
                                                json_encode($state) .
                                                ')'
                                            );

                                            Notification::make()
                                                ->title(
                                                    __('messages.link_copied')
                                                )
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
                Floor::query()
                    ->select('floors.*')
                    ->selectSub(
                        Apartment::query()
                            ->selectRaw('COUNT(*)')
                            ->whereColumn(
                                'apartments.floor',
                                'floors.number'
                            ),
                        'apartments_count'
                    )
                    ->orderBy('floors.number', 'asc')
            )
            ->columns([
                TextColumn::make('number')
                    ->label(__('messages.Floor'))
                    ->numeric(),

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
                        fn (Floor $record): string => ApartmentResource::getUrl(
                            'manage',
                            [
                                'floor' => $record->number,
                            ]
                        )
                    ),
            ])
            ->toolbarActions([]);
    }
}

