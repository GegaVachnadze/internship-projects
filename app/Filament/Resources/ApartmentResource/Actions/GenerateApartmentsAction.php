<?php

namespace App\Filament\Resources\ApartmentResource\Actions;

use App\Enums\UserRole;
use App\Services\ApartmentCreator;
use App\Services\ApartmentNumberParser;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Throwable;

final class GenerateApartmentsAction
{
    public static function make(): Action
    {
        return Action::make('generateApartments')
            ->label(__('messages.generate_apartments'))
            ->icon('heroicon-o-squares-2x2')
            ->visible(
                fn (): bool => auth()->user()?->hasRole(
                    UserRole::Chairman->value
                ) ?? false
            )
            ->schema([
                TextInput::make('floor')
                    ->label(__('messages.floor'))
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(100)
                    ->required(),

                Textarea::make('apartment_numbers')
                    ->label(__('messages.apartment_numbers'))
                    ->placeholder(
                        __('messages.apartment_numbers_placeholder')
                    )
                    ->helperText(
                        __('messages.apartment_numbers_helper')
                    )
                    ->rows(4)
                    ->required(),
            ])
            ->requiresConfirmation()
            ->action(function (array $data): void {
                /** @var array{floor: int|string, apartment_numbers: string} $data */
                self::process(
                    (int) $data['floor'],
                    $data['apartment_numbers']
                );
            });
    }

    public static function makeForFloor(int $floor): Action
    {
        return Action::make('addApartments')
            ->label(__('messages.add_apartments'))
            ->icon('heroicon-o-plus')
            ->visible(
                fn (): bool => auth()->user()?->hasRole(
                    UserRole::Chairman->value
                ) ?? false
            )
            ->schema([
                Textarea::make('apartment_numbers')
                    ->label(__('messages.apartment_numbers'))
                    ->placeholder(
                        __('messages.apartment_numbers_placeholder')
                    )
                    ->helperText(
                        __('messages.apartment_numbers_helper')
                    )
                    ->rows(4)
                    ->required(),
            ])
            ->requiresConfirmation()
            ->action(function (array $data) use ($floor): void {
                /** @var array{apartment_numbers: string} $data */
                self::process(
                    $floor,
                    $data['apartment_numbers']
                );
            });
    }

    private static function process(
        int $floor,
        string $input
    ): void {
        try {
            $parser = new ApartmentNumberParser();
            $creator = new ApartmentCreator();

            $numbers = $parser->parse($input);

            $created = $creator->create(
                $floor,
                $numbers
            );

            Notification::make()
                ->title(__('messages.apartments_generated'))
                ->body(
                    __('messages.apartments_added_count', [
                        'count' => $created,
                        'floor' => $floor,
                    ])
                )
                ->success()
                ->send();
        } catch (ValidationException $e) {
            $message = collect($e->errors())
                ->flatten()
                ->first();

            Notification::make()
                ->title(__('messages.error'))
                ->body(
                    is_string($message)
                        ? $message
                        : __('messages.apartments_generation_failed')
                )
                ->danger()
                ->send();
        } catch (Throwable $e) {
            report($e);

            Notification::make()
                ->title(__('messages.error'))
                ->body(
                    __('messages.apartments_generation_failed')
                )
                ->danger()
                ->send();
        }
    }
}