<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function scopeChairman(Builder $query): Builder
    {
        return $query
            ->where('name', 'Chairman')
            ->where('guard_name', 'web');
    }
}