<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->can('ViewAny:Payment');
    }

    public function view(User $user, Payment $payment): bool
    {
        if (! $user->can('View:Payment')) {
            return false;
        }

        if ($user->hasRole('Resident')) {
            return $payment->monthlyFee->apartment_id === $user->apartment_id;
        }

        return true;
    }

    public function create(User $user): bool
    {
        return $user->can('Create:Payment');
    }

    public function update(User $user, Payment $payment): bool
    {
        if (! $user->can('Update:Payment')) {
            return false;
        }

        if ($user->hasRole('Resident')) {
            return $payment->monthlyFee->apartment_id === $user->apartment_id;
        }

        return true;
    }

    public function delete(User $user, Payment $payment): bool
    {
        if (! $user->can('Delete:Payment')) {
            return false;
        }

        if ($user->hasRole('Resident')) {
            return $payment->monthlyFee->apartment_id === $user->apartment_id;
        }

        return true;
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('DeleteAny:Payment');
    }

    public function restore(User $user, Payment $payment): bool
    {
        return $user->can('Restore:Payment');
    }

    public function forceDelete(User $user, Payment $payment): bool
    {
        return $user->can('ForceDelete:Payment');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('ForceDeleteAny:Payment');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('RestoreAny:Payment');
    }

    public function replicate(User $user, Payment $payment): bool
    {
        return $user->can('Replicate:Payment');
    }

    public function reorder(User $user): bool
    {
        return $user->can('Reorder:Payment');
    }
}