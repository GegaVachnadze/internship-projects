<?php

namespace App\Enums;

enum UserRole: string
{
    case Chairman = 'Chairman';
    case Resident = 'Resident';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}