<?php

namespace App\Filament\Pages\Auth;

use App\Enums\UserRole;
use App\Models\Apartment;
use App\Models\User;
use Filament\Auth\Pages\Register;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
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
                $this->getFloorFormComponent(),
                $this->getApartmentFormComponent(),
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
                        ->whereDoesntHave('users', function ($query) {
                            $query->whereHas(
                                'roles',
                                fn ($roleQuery) => $roleQuery->where(
                                    'name',
                                    UserRole::Resident->value
                                )
                            );
                        })
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

        $apartmentAlreadyOccupied = $apartment->users()
            ->whereHas(
                'roles',
                fn ($query) => $query->where(
                    'name',
                    UserRole::Resident->value
                )
            )
            ->exists();

        if ($apartmentAlreadyOccupied) {
            throw ValidationException::withMessages([
                'apartment_id' => __('messages.invalid_apartment'),
            ]);
        }

        unset($data['floor']);

        $user = User::create($data);

        $user->assignRole(UserRole::Resident->value);

        return $user;
    }
}