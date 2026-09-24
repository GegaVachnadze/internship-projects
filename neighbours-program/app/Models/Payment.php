<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'amount',
        'month',
        'is_paid',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
