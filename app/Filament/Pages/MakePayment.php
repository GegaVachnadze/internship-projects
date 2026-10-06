<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Enums\UserRole;
use App\Models\Announcement;
use App\Models\Payment;
use App\Models\Tenant;
use BackedEnum;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Components\Utilities\Get;
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

    public ?string $tenantId = null;

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

        if (! $currentTenant instanceof Tenant) {
            throw ValidationException::withMessages([
                'data' => __('messages.tenant_not_found'),
            ]);
        }

        $this->tenantId = (string) $currentTenant->getKey();

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

        $this->form->fill([
            'bank' => null,
            'payer_iban' => null,
        ]);
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

                Select::make('bank')
                    ->label(__('messages.bank'))
                    ->options([
                        'tbc' => __('messages.tbc_bank'),
                        'bog' => __('messages.bog_bank'),
                    ])
                    ->placeholder(__('messages.select_bank'))
                    ->required()
                    ->live(),

                Placeholder::make('recipient_account')
                    ->label(__('messages.recipient_account'))
                    ->content(function (Get $get): string {
                        $tenant = $this->getCurrentTenant();

                        return match ($get('bank')) {
                            'tbc' => (string) (
                                $tenant->tbc_iban
                                ?: __('messages.bank_account_not_configured')
                            ),

                            'bog' => (string) (
                                $tenant->bog_iban
                                ?: __('messages.bank_account_not_configured')
                            ),

                            default => '-',
                        };
                    }),

                TextInput::make('payer_iban')
                    ->label(__('messages.payer_account'))
                    ->placeholder(__('messages.payer_account_placeholder'))
                    ->maxLength(34)
                    ->required(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $announcement = $this->getAnnouncement();
        $tenant = $this->getCurrentTenant();

        $bank = $data['bank'] ?? null;

        if (! is_string($bank) || ! in_array($bank, ['tbc', 'bog'], true)) {
            throw ValidationException::withMessages([
                'data.bank' => __('messages.bank_required'),
            ]);
        }

        $recipientAccount = match ($bank) {
            'tbc' => $tenant->tbc_iban,
            'bog' => $tenant->bog_iban,
        };

        if (! is_string($recipientAccount) || trim($recipientAccount) === '') {
            throw ValidationException::withMessages([
                'data.bank' => __('messages.bank_account_not_configured'),
            ]);
        }

        $payerIban = trim((string) ($data['payer_iban'] ?? ''));

        if ($payerIban === '') {
            throw ValidationException::withMessages([
                'data.payer_iban' => __('messages.payer_account_required'),
            ]);
        }

        Payment::create([
            'announcement_id' => $announcement->id,
            'user_id' => auth()->id(),
            'payer_iban' => $payerIban,
            'monthly_fee_id' => null,
            'amount' => $announcement->payment_amount,
            'bank' => $bank,
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

    private function getCurrentTenant(): Tenant
    {
        if ($this->tenantId === null || $this->tenantId === '') {
            throw ValidationException::withMessages([
                'data' => __('messages.tenant_not_found'),
            ]);
        }

        $tenant = Tenant::query()->find($this->tenantId);

        if ($tenant === null) {
            throw ValidationException::withMessages([
                'data' => __('messages.tenant_not_found'),
            ]);
        }

        return $tenant;
    }
}