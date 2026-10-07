<?php

namespace App\Filament\Central\Resources\TenantResource\Pages;

use App\Enums\UserRole;
use App\Filament\Central\Resources\TenantResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;

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
            Action::make('createChairman')
                ->label(__('messages.create_chairman'))
                ->icon('heroicon-o-user-plus')
                ->modalHeading(__('messages.create_chairman'))
                ->modalSubmitActionLabel(__('messages.create_chairman'))
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
                        ->required()
                        ->minLength(8)
                        ->confirmed(),

                    TextInput::make('password_confirmation')
                        ->label(__('messages.password_confirmation'))
                        ->password()
                        ->required(),
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

                        $user = User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => $data['password'],
                        ]);

                        $user->assignRole(UserRole::Chairman->value);
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