<?php

namespace App\Filament\Central\Resources\TenantResource\Pages;

use App\Filament\Central\Resources\TenantResource;
use App\Models\Apartment;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
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
                            'Chairman' => __('messages.chairman'),
                            'Resident' => __('messages.resident'),
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
                            ->whereIn('name', ['Chairman', 'Resident'])
                            ->first();

                        if (! $role) {
                            throw ValidationException::withMessages([
                                'role' => __('messages.invalid_role_selected'),
                            ]);
                        }

                        if (
                            $role->name === 'Chairman' &&
                            User::query()
                                ->whereHas(
                                    'roles',
                                    fn ($query) => $query
                                        ->where('name', 'Chairman')
                                        ->where('guard_name', 'web')
                                )
                                ->exists()
                        ) {
                            throw ValidationException::withMessages([
                                'role' => __('messages.a_tenant_can_have_only_one_chairman'),
                            ]);
                        }

                        if (
                            $role->name === 'Resident' &&
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
        return $table
            ->query(
                $this->record->run(
                    fn () => User::query()
                        ->with(['roles', 'apartment'])
                        ->whereHas(
                            'roles',
                            fn ($query) => $query
                                ->where('guard_name', 'web')
                                ->whereIn('name', ['Chairman', 'Resident'])
                        )
                )
            )
            ->columns([
                TextColumn::make('name')
                    ->label(__('messages.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label(__('messages.email'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('roles.name')
                    ->label(__('messages.role'))
                    ->state(
                        fn (User $record) => $record->roles
                            ->map(
                                fn ($role) => match ($role->name) {
                                    'Chairman' => __('messages.chairman'),
                                    'Resident' => __('messages.resident'),
                                    default => $role->name,
                                }
                            )
                            ->join(', ')
                    )
                    ->badge(),

                TextColumn::make('apartment.apartment_number')
                    ->label(__('messages.apartment'))
                    ->default('-'),
            ])
            ->actions([
                Action::make('editUser')
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
                            ->label(__('messages.new_password'))
                            ->password()
                            ->revealable()
                            ->minLength(8)
                            ->nullable()
                            ->helperText(
                                __('messages.leave_empty_to_keep_current_password')
                            ),

                        Select::make('role')
                            ->label(__('messages.role'))
                            ->options([
                                'Chairman' => __('messages.chairman'),
                                'Resident' => __('messages.resident'),
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
                    ->action(function (User $record, array $data): void {
                        $this->record->run(function () use ($record, $data): void {
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

                            $role = Role::query()
                                ->where('name', $data['role'])
                                ->where('guard_name', 'web')
                                ->whereIn('name', ['Chairman', 'Resident'])
                                ->first();

                            if (! $role) {
                                throw ValidationException::withMessages([
                                    'role' => __('messages.invalid_role_selected'),
                                ]);
                            }

                            if (
                                $role->name === 'Chairman' &&
                                User::query()
                                    ->where('id', '!=', $record->id)
                                    ->whereHas(
                                        'roles',
                                        fn ($query) => $query
                                            ->where('name', 'Chairman')
                                            ->where('guard_name', 'web')
                                    )
                                    ->exists()
                            ) {
                                throw ValidationException::withMessages([
                                    'role' => __('messages.a_tenant_can_have_only_one_chairman'),
                                ]);
                            }

                            if (
                                $role->name === 'Resident' &&
                                empty($data['apartment_id'])
                            ) {
                                throw ValidationException::withMessages([
                                    'apartment_id' => __('messages.apartment_required_for_resident'),
                                ]);
                            }

                            $record->name = $data['name'];
                            $record->email = $data['email'];

                            if (! empty($data['password'])) {
                                $record->password = $data['password'];
                            }

                            $record->apartment_id = $data['apartment_id'] ?? null;

                            $record->save();

                            $record->syncRoles([$role]);
                        });
                    }),

                Action::make('deleteUser')
                    ->label(__('messages.delete'))
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading(
                        fn (User $record) => __('messages.delete_user') . ": {$record->name}"
                    )
                    ->modalDescription(
                        __('messages.delete_user_confirmation')
                    )
                    ->modalSubmitActionLabel(__('messages.delete'))
                    ->action(function (User $record): void {
                        $this->record->run(function () use ($record): void {
                            $record->delete();
                        });
                    }),
            ]);
    }
}
