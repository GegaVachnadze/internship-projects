<?php

namespace App\Filament\Resources\ApartmentResource\Actions;

use App\Enums\UserRole;
use App\Services\FloorCreator;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Throwable;

final class GenerateFloorsAction
{
    public static function make(): Action
    {
        return Action::make('generateFloors')
            ->label(__('messages.generate_floors'))
            ->icon('heroicon-o-building-office-2')
            ->visible(
                fn (): bool => auth()->user()?->hasRole(
                    UserRole::Chairman->value
                ) ?? false
            )
            ->schema([
                TextInput::make('floor_count')
                    ->label(__('messages.floor_count'))
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(100)
                    ->required(),
            ])
            ->requiresConfirmation()
            ->action(function (array $data): void {
                /** @var array{floor_count: int|string} $data */
                self::process((int) $data['floor_count']);
            });
    }

    private static function process(int $count): void
    {
        try {
            $creator = new FloorCreator();
            $created = $creator->create($count);

            Notification::make()
                ->title(__('messages.floors_generated'))
                ->body(
                    __('messages.floors_added_count', [
                        'count' => $created,
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
                        : __('messages.floors_generation_failed')
                )
                ->danger()
                ->send();
        } catch (Throwable $e) {
            report($e);

            Notification::make()
                ->title(__('messages.error'))
                ->body(
                    __('messages.floors_generation_failed')
                )
                ->danger()
                ->send();
        }
    }
}