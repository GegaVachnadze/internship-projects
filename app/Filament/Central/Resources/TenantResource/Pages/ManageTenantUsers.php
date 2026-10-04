<?php

namespace App\Filament\Central\Resources\TenantResource\Pages;

use App\Enums\UserRole;
use App\Filament\Central\Resources\TenantResource;
use App\Filament\Central\Resources\TenantResource\Tables\TenantUsersTable;
use App\Models\Apartment;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class ManageTenantUsers extends Page implements HasTable
{
    use InteractsWithRecord;
    use InteractsWithTable;

    protected static string $resource = TenantResource::class;

    protected string $view = 'filament.central.resources.tenant-resource.pages.manage-tenant-users';

    public function getTitle(): string
    {
        return __('messages.manage_tenant_users');
    }

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('createUser')
                ->label(__('messages.create_user'))
                ->icon('heroicon-o-user-plus')
                ->modalHeading(__('messages.create_user'))
                ->modalSubmitActionLabel(__('messages.create_user'))
                ->schema([
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
                        ->label(__('messages.password'))
                        ->password()
                        ->revealable()
                        ->required()
                        ->minLength(8),

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
                            fn () => $this->record->run(
                                fn () => Apartment::query()
                                    ->orderBy('apartment_number')
                                    ->pluck('apartment_number', 'id')
                                    ->toArray()
                            )
                        )
                        ->searchable()
                        ->preload()
                        ->nullable(),
                ])
                ->action(function (array $data): void {
                    $this->record->run(function () use ($data): void {
                        if (
                            User::query()
                                ->where('email', $data['email'])
                                ->exists()
                        ) {
                            throw ValidationException::withMessages([
                                'email' => __('messages.user_with_this_email_exists'),
                            ]);
                        }

                        $role = Role::query()
                            ->where('name', $data['role'])
                            ->where('guard_name', 'web')
                            ->whereIn('name', UserRole::values())
                            ->first();

                        if (! $role) {
                            throw ValidationException::withMessages([
                                'role' => __('messages.invalid_role_selected'),
                            ]);
                        }

                        if (
                            $role->name === UserRole::Chairman->value &&
                            User::query()
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

                        if (
                            $role->name === UserRole::Resident->value &&
                            empty($data['apartment_id'])
                        ) {
                            throw ValidationException::withMessages([
                                'apartment_id' => __('messages.apartment_required_for_resident'),
                            ]);
                        }

                        $user = User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => $data['password'],
                            'apartment_id' => $data['apartment_id'] ?? null,
                        ]);

                        $user->syncRoles([$role]);
                    });
                }),
        ];
    }

    public function table(Table $table): Table
    {
        return TenantUsersTable::configure($table, $this->record);
    }
}