<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;

final class ApartmentNumberParser
{
    /**
     * @return list<string>
     *
     * @throws ValidationException
     */
    public function parse(string $input): array
    {
        $input = str_replace(
            ['–', '—'],
            '-',
            trim($input)
        );

        $parts = preg_split(
            '/[\s,;]+/u',
            $input,
            -1,
            PREG_SPLIT_NO_EMPTY
        );

        if ($parts === false || $parts === []) {
            throw ValidationException::withMessages([
                'apartment_numbers' => __(
                    'messages.apartment_number_required'
                ),
            ]);
        }

        /** @var array<string, true> $numbers */
        $numbers = [];

        foreach ($parts as $part) {
            $part = mb_strtoupper(trim($part));

            if (
                preg_match(
                    '/^(\d+)-(\d+)$/',
                    $part,
                    $matches
                ) === 1
            ) {
                $start = (int) $matches[1];
                $end = (int) $matches[2];

                /*
                 * Only ascending numeric ranges are expanded.
                 * Example: 37-45 => 37, 38, ..., 45
                 *
                 * 12-1 is treated as a literal apartment number.
                 */
                if ($start < $end) {
                    if (($end - $start) > 999) {
                        throw ValidationException::withMessages([
                            'apartment_numbers' => __(
                                'messages.apartment_range_too_large'
                            ),
                        ]);
                    }

                    for ($number = $start; $number <= $end; $number++) {
                        $value = (string) $number;

                        if (isset($numbers[$value])) {
                            throw ValidationException::withMessages([
                                'apartment_numbers' => __(
                                    'messages.duplicate_apartment_number',
                                    [
                                        'number' => $value,
                                    ]
                                ),
                            ]);
                        }

                        $numbers[$value] = true;
                    }

                    continue;
                }
            }

            if (
                preg_match(
                    '/^[\p{L}\p{N}][\p{L}\p{N}._\/-]*$/u',
                    $part
                ) !== 1
            ) {
                throw ValidationException::withMessages([
                    'apartment_numbers' => __(
                        'messages.invalid_apartment_number_format',
                        [
                            'number' => $part,
                        ]
                    ),
                ]);
            }

            if (isset($numbers[$part])) {
                throw ValidationException::withMessages([
                    'apartment_numbers' => __(
                        'messages.duplicate_apartment_number',
                        [
                            'number' => $part,
                        ]
                    ),
                ]);
            }

            $numbers[$part] = true;
        }

        /** @var list<string> $result */
        $result = array_keys($numbers);

        return $result;
    }
}