<?php

namespace App\Filament\Central\Resources\TenantResource\Schemas;

use App\Enums\UserRole;
use App\Models\Apartment;
use App\Models\Tenant;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class TenantUserForm
{
    public static function configure(Tenant $tenant, bool $editing = false): array
    {
        return [
            TextInput::make('name')
                ->label(__('messages.name'))
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label(__('messages.email'))
                ->email()
                ->required()
                ->maxLength(255),

            TextInput::make('password')
                ->label(
                    $editing
                        ? __('messages.new_password')
                        : __('messages.password')
                )
                ->password()
                ->revealable()
                ->minLength(8)
                ->nullable($editing)
                ->required(! $editing)
                ->helperText(
                    $editing
                        ? __('messages.leave_empty_to_keep_current_password')
                        : null
                ),

            Select::make('role')
                ->label(__('messages.role'))
                ->options([
                    UserRole::Chairman->value => __('messages.chairman'),
                    UserRole::Resident->value => __('messages.resident'),
                ])
                ->required(),

            Select::make('apartment_id')
                ->label(__('messages.apartment'))
                ->options(
                    fn (): array => $tenant->run(
                        fn (): array => Apartment::query()
                            ->orderBy('apartment_number')
                            ->pluck('apartment_number', 'id')
                            ->toArray()
                    )
                )
                ->searchable()
                ->preload()
                ->nullable(),
        ];
    }
}