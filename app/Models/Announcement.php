<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'body',
        'requires_payment',
    ];

    protected function casts(): array
    {
        return [
            'requires_payment' => 'boolean',
        ];
    }
}
