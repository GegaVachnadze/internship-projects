<?php

namespace App\Filament\Pages\Auth;

use App\Enums\UserRole;
use App\Models\Apartment;
use App\Models\User;
use Filament\Auth\Pages\Register;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

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
                $this->getApartmentFormComponent(),
            ]);
    }

    protected function getApartmentFormComponent(): Select
    {
        return Select::make('apartment_id')
            ->label(__('messages.apartment'))
            ->options(
                fn (): array => Apartment::query()
                    ->orderBy('apartment_number')
                    ->pluck('apartment_number', 'id')
                    ->toArray()
            )
            ->searchable()
            ->preload()
            ->required();
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create($data);

        $user->assignRole(UserRole::Resident->value);

        return $user;
    }
}