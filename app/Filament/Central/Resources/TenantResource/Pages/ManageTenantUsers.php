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
                ->label('Create User')
                ->icon('heroicon-o-user-plus')
                ->modalHeading('Create User')
                ->modalSubmitActionLabel('Create User')
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
                        ->options(
                            fn () => $this->record->run(
                                fn () => Role::query()
                                    ->where('name', 'Chairman')
                                    ->where('guard_name', 'web')
                                    ->pluck('name', 'name')
                                    ->toArray()
                            )
                        )
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
                                'email' => 'A user with this email already exists in this tenant.',
                            ]);
                        }

                        $role = Role::query()
                            ->where('name', $data['role'])
                            ->where('guard_name', 'web')
                            ->whereIn('name', ['Chairman'])
                            ->first();

                        if (! $role) {
                            throw ValidationException::withMessages([
                                'role' => 'Invalid role selected.',
                            ]);
                        }

                        $user = User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => $data['password'],
                        ]);

                        $user->syncRoles([$role]);
                    });
                }),
        ];
    }

    public function table(Table $table): Table
    {
        return \App\Filament\Central\Resources\TenantResource\Tables\TenantUsersTable::configure(
            $table,
            $this->record
        );
    }
}
