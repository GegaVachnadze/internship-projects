<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Enums\UserRole;
use App\Models\MonthlyFee;
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

    protected string $view = 'filament.pages.make-payment';

    protected static ?string $slug = 'payments/pay';

    public ?array $data = [];

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
        $user = auth()->user();

        if ($user === null || $user->apartment_id === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.payment_unavailable'),
            ]);
        }

        $monthlyFee = $this->getPayableMonthlyFee();

        if ($monthlyFee === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.no_pending_payment'),
            ]);
        }

        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('month')
                    ->label(__('messages.Month'))
                    ->content(function (): string {
                        return $this->getPayableMonthlyFee()?->month ?? '-';
                    }),

                Placeholder::make('amount')
                    ->label(__('messages.payment_amount'))
                    ->content(function (): string {
                        $monthlyFee = $this->getPayableMonthlyFee();

                        return $monthlyFee === null
                            ? '-'
                            : number_format((float) $monthlyFee->amount, 2) . ' ₾';
                    }),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $user = auth()->user();

        if ($user === null || $user->apartment_id === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.payment_unavailable'),
            ]);
        }

        $monthlyFee = $this->getPayableMonthlyFee();

        if ($monthlyFee === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.no_pending_payment'),
            ]);
        }

        Payment::create([
            'monthly_fee_id' => $monthlyFee->id,
            'user_id' => $user->id,
            'amount' => $monthlyFee->amount,
            'status' => 'pending',
        ]);

        $this->saved = true;
    }

    private function getPayableMonthlyFee(): ?MonthlyFee
    {
        $user = auth()->user();

        if ($user === null || $user->apartment_id === null) {
            return null;
        }

        return MonthlyFee::query()
            ->where('apartment_id', $user->apartment_id)
            ->whereDoesntHave('payments')
            ->orderBy('month')
            ->first();
    }
}