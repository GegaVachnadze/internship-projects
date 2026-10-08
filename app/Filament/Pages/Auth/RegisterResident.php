<?php

namespace App\Filament\Pages\Auth;

use App\Enums\UserRole;
use App\Models\Apartment;
use App\Models\Floor;
use App\Models\User;
use Filament\Auth\Pages\Register;
use Filament\Forms\Components\TextInput;
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
                        $this->getApartmentNumberFormComponent(),
                    ]),
            ]);
    }

    protected function getFloorFormComponent(): TextInput
    {
        return TextInput::make('floor')
            ->label(__('messages.floor'))
            ->numeric()
            ->minValue(1)
            ->required()
            ->validationMessages([
                'required' => __('messages.floor_required'),
            ]);
    }

    protected function getApartmentNumberFormComponent(): TextInput
    {
        return TextInput::make('apartment_number')
            ->label(__('messages.apartment'))
            ->numeric()
            ->minValue(1)
            ->required()
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

        $apartmentNumber = (string) $data['apartment_number'];

        Floor::query()->firstOrCreate([
            'number' => $floor,
        ]);

        $apartment = Apartment::query()->firstOrCreate(
            [
                'floor' => $floor,
                'apartment_number' => $apartmentNumber,
            ],
        );

        unset($data['floor'], $data['apartment_number']);

        $user = User::create([
            ...$data,
            'apartment_id' => $apartment->id,
        ]);

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