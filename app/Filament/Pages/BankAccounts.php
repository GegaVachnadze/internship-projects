<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\Tenant;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Validation\ValidationException;

class BankAccounts extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected static ?string $slug = 'bank-accounts';

    protected string $view = 'filament.pages.bank-accounts';

    public ?array $data = [];

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return 'heroicon-o-building-library';
    }

    public static function getNavigationLabel(): string
    {
        return __('messages.bank_accounts');
    }

    public function mount(): void
    {
        $tenant = $this->getCurrentTenant();

        $this->form->fill([
            'tbc_iban' => $tenant->tbc_iban,
            'bog_iban' => $tenant->bog_iban,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('tbc_iban')
                    ->label(__('messages.tbc_iban'))
                    ->placeholder('GE00TBC00000000000000')
                    ->maxLength(34),

                TextInput::make('bog_iban')
                    ->label(__('messages.bog_iban'))
                    ->placeholder('GE00BOG00000000000000')
                    ->maxLength(34),
            ])
            ->statePath('data');
    }

public function save(): void
{
    $data = $this->form->getState();

    $tenant = $this->getCurrentTenant();

    $connection = config('tenancy.database.central_connection');

    \DB::connection($connection)
        ->table('tenants')
        ->where('id', $tenant->id)
        ->update([
            'tbc_iban' => $data['tbc_iban'] ?? null,
            'bog_iban' => $data['bog_iban'] ?? null,
        ]);

    dd(
        \DB::connection($connection)
            ->table('tenants')
            ->where('id', $tenant->id)
            ->first(['id', 'tbc_iban', 'bog_iban'])
    );
}

    private function getCurrentTenant(): Tenant
    {
        $tenantId = request()->route('tenant');

        if (! is_string($tenantId) || $tenantId === '') {
            throw ValidationException::withMessages([
                'data' => 'Tenant could not be determined.',
            ]);
        }

        $tenant = Tenant::query()->find($tenantId);

        if ($tenant === null) {
            throw ValidationException::withMessages([
                'data' => 'Tenant could not be found.',
            ]);
        }

        return $tenant;
    }
}