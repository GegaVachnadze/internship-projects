<?php

namespace App\Filament\Widgets;

use App\Enums\UserRole;
use App\Models\Announcement;
use App\Models\MonthlyFee;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Carbon\Carbon;

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

    public function payMonthlyFee(): void
    {
        $user = auth()->user();

        abort_unless(
            $user?->hasRole(UserRole::Resident->value),
            403,
        );

        abort_unless(
            $user->apartment_id,
            422,
        );

        $currentMonth = now()->month;
        $currentYear = now()->year;

        $monthlyFee = MonthlyFee::query()
            ->where('apartment_id', $user->apartment_id)
            ->where('is_paid', false)
            ->get()
            ->filter(function (MonthlyFee $fee) use ($currentMonth, $currentYear): bool {
                try {
                    $date = Carbon::createFromFormat('n/j/Y', $fee->month);

                    return $date->month === $currentMonth
                        && $date->year === $currentYear;
                } catch (\Throwable) {
                    return false;
                }
            })
            ->sortByDesc(function (MonthlyFee $fee): int {
                return Carbon::createFromFormat('n/j/Y', $fee->month)->timestamp;
            })
            ->first();

        if (! $monthlyFee) {
            Notification::make()
                ->title('გადასახდელი გადასახადი ვერ მოიძებნა')
                ->danger()
                ->send();

            return;
        }

        $monthlyFee->update([
            'is_paid' => true,
        ]);

        Notification::make()
            ->title('გადასახადი წარმატებით გადაიხადეთ')
            ->success()
            ->send();
    }

    public function deleteAnnouncement(int $announcementId): void
    {
        abort_unless(
            auth()->user()?->hasRole(UserRole::Chairman->value),
            403,
        );

        $announcement = Announcement::query()->findOrFail($announcementId);

        $announcement->delete();
    }
}