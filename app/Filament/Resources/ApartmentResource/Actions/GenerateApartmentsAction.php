<?php

namespace App\Filament\Resources\ApartmentResource\Actions;

use App\Enums\UserRole;
use App\Models\Apartment;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class GenerateApartmentsAction
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

                TextInput::make('count')
                    ->label(__('messages.apartments_to_add'))
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(99)
                    ->required(),
            ])
            ->requiresConfirmation()
            ->action(
                function (array $data): void {
                    $floor = (int) $data['floor'];
                    $count = (int) $data['count'];

                    $created = self::addApartments($floor, $count);

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
                }
            );
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
                TextInput::make('count')
                    ->label(__('messages.apartments_to_add'))
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->maxValue(99)
                    ->required(),
            ])
            ->requiresConfirmation()
            ->action(
                function (array $data) use ($floor): void {
                    $count = (int) $data['count'];

                    $created = self::addApartments($floor, $count);

                    Notification::make()
                        ->title(__('messages.apartments_added'))
                        ->body(
                            __('messages.apartments_added_count', [
                                'count' => $created,
                                'floor' => $floor,
                            ])
                        )
                        ->success()
                        ->send();
                }
            );
    }

    protected static function addApartments(
        int $floor,
        int $count
    ): int {
        if ($floor < 1 || $floor > 100) {
            throw ValidationException::withMessages([
                'floor' => __('messages.invalid_floor'),
            ]);
        }

        if ($count < 1) {
            throw ValidationException::withMessages([
                'count' => __('messages.invalid_apartment_count'),
            ]);
        }

        return DB::transaction(
            function () use ($floor, $count): int {
                $firstNumber = ($floor * 100) + 1;
                $lastNumber = ($floor * 100) + 99;

                $existingNumbers = Apartment::query()
                    ->where('floor', $floor)
                    ->pluck('apartment_number')
                    ->map(
                        fn (mixed $number): int => (int) $number
                    )
                    ->all();

                $usedNumbers = array_fill_keys(
                    $existingNumbers,
                    true
                );

                $created = 0;
                $nextNumber = $firstNumber;

                while ($created < $count) {
                    while (
                        isset($usedNumbers[$nextNumber]) &&
                        $nextNumber <= $lastNumber
                    ) {
                        $nextNumber++;
                    }

                    if ($nextNumber > $lastNumber) {
                        throw ValidationException::withMessages([
                            'count' => __('messages.floor_apartment_limit'),
                        ]);
                    }

                    Apartment::create([
                        'apartment_number' => $nextNumber,
                        'floor' => $floor,
                    ]);

                    $usedNumbers[$nextNumber] = true;
                    $created++;
                    $nextNumber++;
                }

                return $created;
            }
        );
    }
}