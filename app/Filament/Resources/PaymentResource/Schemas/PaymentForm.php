<?php

declare(strict_types=1);

namespace App\Filament\Resources\PaymentResource\Schemas;

use App\Models\Announcement;
use App\Models\Tenant;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('announcement_id')
                    ->default(function (): ?int {
                        $announcementId = request()->integer('announcement_id');

                        return $announcementId > 0
                            ? $announcementId
                            : null;
                    })
                    ->dehydrated(),

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
                        $tenantId = request()->route('tenant');

                        if (! is_string($tenantId) || $tenantId === '') {
                            return '-';
                        }

                        $tenant = Tenant::query()->find($tenantId);

                        if ($tenant === null) {
                            return '-';
                        }

                        return match ($get('bank')) {
                            'tbc' => $tenant->tbc_iban
                                ?: __('messages.bank_account_not_configured'),

                            'bog' => $tenant->bog_iban
                                ?: __('messages.bank_account_not_configured'),

                            default => '-',
                        };
                    }),

                TextInput::make('amount')
                    ->label(__('messages.Amount'))
                    ->numeric()
                    ->prefix('₾')
                    ->readOnly()
                    ->required()
                    ->dehydrated()
                    ->default(function (): ?string {
                        $announcementId = request()->integer('announcement_id');

                        if ($announcementId <= 0) {
                            return null;
                        }

                        return Announcement::query()
                            ->where('requires_payment', true)
                            ->find($announcementId)
                            ?->payment_amount;
                    }),
            ]);
    }
}