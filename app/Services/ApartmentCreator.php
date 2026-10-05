<?php

namespace App\Services;

use App\Models\Apartment;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class ApartmentCreator
{
    /**
     * @param list<string> $numbers
     *
     * @throws ValidationException
     */
    public function create(int $floor, array $numbers): int
    {
        if ($floor < 1 || $floor > 100) {
            throw ValidationException::withMessages([
                'floor' => __('messages.invalid_floor'),
            ]);
        }

        return DB::transaction(
            function () use ($floor, $numbers): int {
                $existing = Apartment::query()
                    ->whereIn('apartment_number', $numbers)
                    ->pluck('apartment_number')
                    ->map(
                        static fn (mixed $number): string => mb_strtoupper(
                            trim((string) $number)
                        )
                    )
                    ->values()
                    ->all();

                if ($existing !== []) {
                    throw ValidationException::withMessages([
                        'apartment_numbers' => __(
                            'messages.apartment_already_exists',
                            [
                                'number' => $existing[0],
                            ]
                        ),
                    ]);
                }

                foreach ($numbers as $number) {
                    Apartment::create([
                        'apartment_number' => $number,
                        'floor' => $floor,
                    ]);
                }

                return count($numbers);
            }
        );
    }
}