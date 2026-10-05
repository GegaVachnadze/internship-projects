<?php

namespace App\Filament\Widgets;

use App\Models\Announcement;
use Filament\Widgets\Widget;

class ResidentAnnouncements extends Widget
{
    protected string $view = 'filament.widgets.resident-announcements';

    protected int|string|array $columnSpan = 'full';

    /**
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'announcements' => Announcement::query()
                ->latest()
                ->get(),
        ];
    }

    public function deleteAnnouncement(int $announcementId): void
    {
        abort_unless(
            auth()->user()?->hasRole(\App\Enums\UserRole::Chairman->value),
            403,
        );

        $announcement = Announcement::query()->findOrFail($announcementId);

        $announcement->delete();
    }
}