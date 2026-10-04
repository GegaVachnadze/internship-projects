<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case Paid = 'paid';
    case Completed = 'completed';
    case Complete = 'complete';
    case Success = 'success';
    case Successful = 'successful';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}