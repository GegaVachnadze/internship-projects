<?php

namespace App\Enums;

enum UserRole: string
{
    case Chairman = 'Chairman';
    case Resident = 'Resident';

    public function label(): string
    {
        return match ($this) {
            self::Chairman => __('messages.chairman'),
            self::Resident => __('messages.resident'),
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}