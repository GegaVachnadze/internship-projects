<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Neighborhood extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Users belonging to this neighborhood.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Announcements belonging to this neighborhood.
     */
    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    /**
     * Apartments belonging to this neighborhood.
     */
    public function apartments(): HasMany
    {
        return $this->hasMany(Apartment::class);
    }

    /**
     * Expenses belonging to this neighborhood.
     */
    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Payments belonging to this neighborhood.
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
