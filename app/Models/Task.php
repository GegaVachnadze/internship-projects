<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_ka',
        'description_en',
        'description_ka',
        'due_date',
    ];
}
