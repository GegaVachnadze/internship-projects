<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\MonthlyFee;
use Illuminate\Auth\Access\HandlesAuthorization;

class MonthlyFeePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:MonthlyFee');
    }

    public function view(AuthUser $authUser, MonthlyFee $monthlyFee): bool
    {
        return $authUser->can('View:MonthlyFee');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:MonthlyFee');
    }

    public function update(AuthUser $authUser, MonthlyFee $monthlyFee): bool
    {
        return $authUser->can('Update:MonthlyFee');
    }

    public function delete(AuthUser $authUser, MonthlyFee $monthlyFee): bool
    {
        return $authUser->can('Delete:MonthlyFee');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:MonthlyFee');
    }

    public function restore(AuthUser $authUser, MonthlyFee $monthlyFee): bool
    {
        return $authUser->can('Restore:MonthlyFee');
    }

    public function forceDelete(AuthUser $authUser, MonthlyFee $monthlyFee): bool
    {
        return $authUser->can('ForceDelete:MonthlyFee');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:MonthlyFee');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:MonthlyFee');
    }

    public function replicate(AuthUser $authUser, MonthlyFee $monthlyFee): bool
    {
        return $authUser->can('Replicate:MonthlyFee');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:MonthlyFee');
    }

}