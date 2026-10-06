<?php

namespace App\Notifications;

use App\Models\Announcement;
use Filament\Actions\Action;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AnnouncementNotification extends Notification
{
    use Queueable;

    public function __construct(
        public Announcement $announcement,
    ) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        $url = request()->getSchemeAndHttpHost()
            . '/building#announcement-'
            . $this->announcement->id;

        return FilamentNotification::make()
            ->title($this->announcement->title)
            ->body($this->announcement->body)
            ->actions([
                Action::make('view')
                    ->label(__('messages.view_announcement'))
                    ->url($url),
            ])
            ->getDatabaseMessage();
    }
}