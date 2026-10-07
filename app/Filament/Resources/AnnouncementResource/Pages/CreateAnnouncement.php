<?php

namespace App\Filament\Resources\AnnouncementResource\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\AnnouncementResource;
use App\Models\User;
use App\Notifications\AnnouncementNotification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Builder;

class CreateAnnouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function afterCreate(): void
    {
        $announcement = $this->record;

        $users = User::query()
            ->whereHas(
                'roles',
                function (Builder $query): void {
                    $query->where('name', UserRole::Resident->value);
                }
            )
            ->get();

        foreach ($users as $user) {
            $user->notify(new AnnouncementNotification($announcement));
        }
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.building.pages.dashboard');
    }
}