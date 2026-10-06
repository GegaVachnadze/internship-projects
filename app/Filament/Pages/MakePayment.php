<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Enums\UserRole;
use App\Models\Announcement;
use App\Models\Payment;
use BackedEnum;
use Filament\Forms\Components\Placeholder;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Validation\ValidationException;

class MakePayment extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected static ?string $slug = 'payments/{announcement}/pay';

    protected string $view = 'filament.pages.make-payment';

    public ?array $data = [];

    public ?int $announcementId = null;

    public bool $saved = false;

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return 'heroicon-o-banknotes';
    }

    public static function getNavigationLabel(): string
    {
        return __('messages.make_payment');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole(UserRole::Resident->value) ?? false;
    }

    public function mount(): void
    {
        $currentTenant = tenant();

        if ($currentTenant === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.tenant_not_found'),
            ]);
        }

        $announcementId = request()->route('announcement');

        if (! is_numeric($announcementId)) {
            throw ValidationException::withMessages([
                'data' => __('messages.payment_unavailable'),
            ]);
        }

        $announcement = Announcement::query()
            ->where('requires_payment', true)
            ->find((int) $announcementId);

        if ($announcement === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.payment_unavailable'),
            ]);
        }

        $this->announcementId = $announcement->id;

        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('announcement_title')
                    ->label(__('messages.announcement'))
                    ->content(function (): string {
                        return $this->getAnnouncement()->title;
                    }),

                Placeholder::make('amount')
                    ->label(__('messages.payment_amount'))
                    ->content(function (): string {
                        return number_format(
                            (float) $this->getAnnouncement()->payment_amount,
                            2
                        ) . ' ₾';
                    }),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $announcement = $this->getAnnouncement();

        Payment::create([
            'announcement_id' => $announcement->id,
            'user_id' => auth()->id(),
            'monthly_fee_id' => null,
            'amount' => $announcement->payment_amount,
        ]);

        $this->saved = true;
    }

    private function getAnnouncement(): Announcement
    {
        if ($this->announcementId === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.payment_unavailable'),
            ]);
        }

        $announcement = Announcement::query()
            ->where('requires_payment', true)
            ->find($this->announcementId);

        if ($announcement === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.payment_unavailable'),
            ]);
        }

        return $announcement;
    }
}