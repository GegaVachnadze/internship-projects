<?php

namespace App\Services;

use App\Models\Floor;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class FloorCreator
{
    /**
     * @throws ValidationException
     */
    public function create(int $count): int
    {
        if ($count < 1 || $count > 100) {
            throw ValidationException::withMessages([
                'floor_count' => __('messages.invalid_floor_count'),
            ]);
        }

        return DB::transaction(
            function () use ($count): int {
                $existingFloors = Floor::query()
                    ->whereBetween('number', [1, $count])
                    ->pluck('number')
                    ->map(
                        static fn (mixed $number): int => (int) $number
                    )
                    ->all();

                $existing = array_fill_keys($existingFloors, true);

                $created = 0;

                for ($number = 1; $number <= $count; $number++) {
                    if (isset($existing[$number])) {
                        continue;
                    }

                    Floor::create([
                        'number' => $number,
                    ]);

                    $created++;
                }

                return $created;
            }
        );
    }
}