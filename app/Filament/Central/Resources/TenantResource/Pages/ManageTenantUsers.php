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

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('createUser')
                ->label('Create User')
                ->icon('heroicon-o-user-plus')
                ->modalHeading('Create User')
                ->modalSubmitActionLabel('Create User')
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->revealable()
                        ->required()
                        ->minLength(8),

                    Select::make('role')
                        ->label('Role')
                        ->options(
                            fn () => $this->record->run(
                                fn () => Role::query()
                                    ->whereIn('name', ['Chairman', 'Resident'])
                                    ->where('guard_name', 'web')
                                    ->pluck('name', 'name')
                                    ->toArray()
                            )
                        )
                        ->required(),

                    Select::make('apartment_id')
                        ->label('Apartment')
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
                                'email' => 'A user with this email already exists in this tenant.',
                            ]);
                        }

                        $role = Role::query()
                            ->where('name', $data['role'])
                            ->where('guard_name', 'web')
                            ->whereIn('name', ['Chairman', 'Resident'])
                            ->first();

                        if (! $role) {
                            throw ValidationException::withMessages([
                                'role' => 'Invalid role selected.',
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
                                'role' => 'A tenant can have only one Chairman.',
                            ]);
                        }

                        if (
                            $role->name === 'Resident' &&
                            empty($data['apartment_id'])
                        ) {
                            throw ValidationException::withMessages([
                                'apartment_id' => 'Apartment is required for a Resident.',
                            ]);
                        }

                        $user = User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => $data['password'],
                            'apartment_id' => $role->name === 'Resident'
                                ? ($data['apartment_id'] ?? null)
                                : null,
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
                )
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('roles.name')
                    ->label('Role')
                    ->badge(),

                TextColumn::make('apartment.apartment_number')
                    ->label('Apartment')
                    ->default('-'),
            ]);
    }
}