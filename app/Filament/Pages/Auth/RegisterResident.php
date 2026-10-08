<?php

namespace App\Filament\Pages\Auth;

use App\Enums\UserRole;
use App\Models\Apartment;
use App\Models\User;
use Filament\Auth\Pages\Register;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;

class RegisterResident extends Register
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),

                ...($this->isChairmanRegistration()
                    ? []
                    : [
                        $this->getFloorFormComponent(),
                        $this->getApartmentFormComponent(),
                    ]),
            ]);
    }

    protected function getFloorFormComponent(): Select
    {
        return Select::make('floor')
            ->label(__('messages.floor'))
            ->options(
                fn (): array => Apartment::query()
                    ->select('floor')
                    ->distinct()
                    ->orderBy('floor')
                    ->pluck('floor', 'floor')
                    ->toArray()
            )
            ->live()
            ->required()
            ->validationMessages([
                'required' => __('messages.floor_required'),
            ]);
    }

    protected function getApartmentFormComponent(): Select
    {
        return Select::make('apartment_id')
            ->label(__('messages.apartment'))
            ->options(
                fn (Get $get): array => $get('floor')
                    ? Apartment::query()
                        ->where('floor', (int) $get('floor'))
                        ->orderBy('apartment_number')
                        ->pluck('apartment_number', 'id')
                        ->toArray()
                    : []
            )
            ->searchable()
            ->preload()
            ->required()
            ->disabled(
                fn (Get $get): bool => blank($get('floor'))
            )
            ->validationMessages([
                'required' => __('messages.apartment_required'),
            ]);
    }

    protected function handleRegistration(array $data): User
    {
        if ($this->isChairmanRegistration()) {
            $this->validateChairmanToken();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            $user->assignRole(UserRole::Chairman->value);

            return $user;
        }

        $floor = (int) $data['floor'];

        $apartmentId = (int) $data['apartment_id'];

        $apartment = Apartment::query()
            ->whereKey($apartmentId)
            ->where('floor', $floor)
            ->first();

        if (! $apartment) {
            throw ValidationException::withMessages([
                'apartment_id' => __('messages.invalid_apartment'),
            ]);
        }

        unset($data['floor']);

        $user = User::create($data);

        $user->assignRole(UserRole::Resident->value);

        return $user;
    }

    protected function isChairmanRegistration(): bool
    {
        return filled(request()->query('chairman_token'));
    }

    protected function validateChairmanToken(): void
    {
        $token = request()->query('chairman_token');

        if (! is_string($token) || $token === '') {
            throw ValidationException::withMessages([
                'email' => 'This Chairman registration link is invalid.',
            ]);
        }

        $tenant = tenancy()->tenant;

        if (! $tenant) {
            throw ValidationException::withMessages([
                'email' => 'This Chairman registration link is invalid.',
            ]);
        }

        $expectedToken = hash_hmac(
            'sha256',
            'chairman-registration|' . $tenant->getTenantKey(),
            config('app.key')
        );

        if (! hash_equals($expectedToken, $token)) {
            throw ValidationException::withMessages([
                'email' => 'This Chairman registration link is invalid.',
            ]);
        }

        if (
            User::query()
                ->whereHas(
                    'roles',
                    fn (Builder $query): Builder => $query->where(
                        'name',
                        UserRole::Chairman->value
                    )
                )
                ->exists()
        ) {
            throw ValidationException::withMessages([
                'email' => __('messages.a_tenant_can_have_only_one_chairman'),
            ]);
        }
    }
}