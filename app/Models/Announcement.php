<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'body',
        'requires_payment',
        'payment_amount',
    ];

    protected function casts(): array
    {
        return [
            'requires_payment' => 'boolean',
            'payment_amount' => 'decimal:2',
        ];
    }
}