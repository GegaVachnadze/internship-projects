<?php

namespace App\Filament\Central\Resources\TenantResource\Actions;

use App\Enums\UserRole;
use App\Models\Apartment;
use App\Models\Tenant;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class TenantUserActions
{
    public static function edit(Tenant $tenant): Action
    {
        return Action::make('editUser')
            ->label(__('messages.edit'))
            ->icon('heroicon-o-pencil-square')
            ->modalHeading(
                fn (User $record) => __('messages.edit_user') . ": {$record->name}"
            )
            ->modalSubmitActionLabel(__('messages.save_changes'))
            ->fillForm(
                fn (User $record): array => [
                    'name' => $record->name,
                    'email' => $record->email,
                    'role' => $record->roles->first()?->name,
                    'apartment_id' => $record->apartment_id,
                ]
            )
            ->schema(self::userFormSchema($tenant, true))
            ->action(function (User $record, array $data) use ($tenant): void {
                $tenant->run(function () use ($record, $data): void {
                    if (
                        User::query()
                            ->where('email', $data['email'])
                            ->where('id', '!=', $record->id)
                            ->exists()
                    ) {
                        throw ValidationException::withMessages([
                            'email' => __('messages.user_with_this_email_exists'),
                        ]);
                    }

                    $role = self::findRole($data['role']);

                    if (! $role) {
                        throw ValidationException::withMessages([
                            'role' => __('messages.invalid_role_selected'),
                        ]);
                    }

                    self::validateChairmanLimit($role, $record->id);
                    self::validateResidentApartment(
                        $role,
                        $data['apartment_id'] ?? null
                    );

                    $record->name = $data['name'];
                    $record->email = $data['email'];

                    if (! empty($data['password'])) {
                        $record->password = $data['password'];
                    }

                    $record->apartment_id = $data['apartment_id'] ?? null;

                    $record->save();
                    $record->syncRoles([$role]);
                });
            });
    }

    public static function delete(Tenant $tenant): Action
    {
        return Action::make('deleteUser')
            ->label(__('messages.delete'))
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->requiresConfirmation()
            ->modalHeading(
                fn (User $record) => __('messages.delete_user') . ": {$record->name}"
            )
            ->modalDescription(__('messages.delete_user_confirmation'))
            ->modalSubmitActionLabel(__('messages.delete'))
            ->action(function (User $record) use ($tenant): void {
                $tenant->run(function () use ($record): void {
                    $record->delete();
                });
            });
    }

    private static function userFormSchema(Tenant $tenant, bool $editing): array
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
                ->nullable()
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
                    fn () => $tenant->run(
                        fn () => Apartment::query()
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

    private static function findRole(string $roleName): ?Role
    {
        return Role::query()
            ->where('name', $roleName)
            ->where('guard_name', 'web')
            ->whereIn('name', UserRole::values())
            ->first();
    }

    private static function validateChairmanLimit(
        Role $role,
        int $exceptUserId
    ): void {
        if (
            $role->name === UserRole::Chairman->value &&
            User::query()
                ->where('id', '!=', $exceptUserId)
                ->whereHas(
                    'roles',
                    fn ($query) => $query
                        ->where('name', UserRole::Chairman->value)
                        ->where('guard_name', 'web')
                )
                ->exists()
        ) {
            throw ValidationException::withMessages([
                'role' => __('messages.a_tenant_can_have_only_one_chairman'),
            ]);
        }
    }

    private static function validateResidentApartment(
        Role $role,
        ?int $apartmentId
    ): void {
        if (
            $role->name === UserRole::Resident->value &&
            empty($apartmentId)
        ) {
            throw ValidationException::withMessages([
                'apartment_id' => __('messages.apartment_required_for_resident'),
            ]);
        }
    }
}