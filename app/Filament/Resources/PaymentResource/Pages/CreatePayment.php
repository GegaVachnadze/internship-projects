<?php

declare(strict_types=1);

namespace App\Filament\Resources\PaymentResource\Pages;

use App\Filament\Resources\PaymentResource;
use App\Models\Announcement;
use App\Models\Tenant;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreatePayment extends CreateRecord
{
    protected static string $resource = PaymentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $announcementId = isset($data['announcement_id'])
            ? (int) $data['announcement_id']
            : 0;

        if ($announcementId <= 0) {
            throw ValidationException::withMessages([
                'announcement_id' => __('messages.payment_announcement_required'),
            ]);
        }

        $announcement = Announcement::query()
            ->where('requires_payment', true)
            ->find($announcementId);

        if ($announcement === null) {
            throw ValidationException::withMessages([
                'announcement_id' => __('messages.payment_unavailable'),
            ]);
        }

        $bank = (string) ($data['bank'] ?? '');

        if (! in_array($bank, ['tbc', 'bog'], true)) {
            throw ValidationException::withMessages([
                'bank' => __('messages.bank_required'),
            ]);
        }

        $tenantId = request()->route('tenant');

        if (! is_string($tenantId) || $tenantId === '') {
            throw ValidationException::withMessages([
                'bank' => __('messages.tenant_not_found'),
            ]);
        }

        $tenant = Tenant::query()->find($tenantId);

        if ($tenant === null) {
            throw ValidationException::withMessages([
                'bank' => __('messages.tenant_not_found'),
            ]);
        }

        $recipientAccount = match ($bank) {
            'tbc' => $tenant->tbc_iban,
            'bog' => $tenant->bog_iban,
        };

        if (! is_string($recipientAccount) || trim($recipientAccount) === '') {
            throw ValidationException::withMessages([
                'bank' => __('messages.bank_account_not_configured'),
            ]);
        }

        $data['announcement_id'] = $announcement->id;
        $data['user_id'] = auth()->id();
        $data['monthly_fee_id'] = null;
        $data['amount'] = $announcement->payment_amount;
        $data['bank'] = $bank;

        return $data;
    }
}