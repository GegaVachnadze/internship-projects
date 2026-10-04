<?php

namespace App\Filament\Central\Resources\TenantResource\Tables;

use App\Enums\UserRole;
use App\Filament\Central\Resources\TenantResource\Actions\TenantUserActions;
use App\Models\Tenant;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;

class TenantUsersTable
{
    public static function configure(Table $table, Tenant $tenant): Table
    {
        return $table
            ->query(
                $tenant->run(
                    fn (): Builder => User::query()
                        ->with(['roles', 'apartment'])
                        ->whereHas(
                            'roles',
                            fn (Builder $query): Builder => $query
                                ->where('guard_name', 'web')
                                ->whereIn('name', UserRole::values())
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
                        fn (User $record): string => $record->roles
                            ->map(
                                fn (Role $role): string =>
                                    UserRole::tryFrom($role->name)?->label()
                                    ?? $role->name
                            )
                            ->join(', ')
                    )
                    ->badge(),

                TextColumn::make('apartment.apartment_number')
                    ->label(__('messages.apartment'))
                    ->default('-'),
            ])
            ->actions([
                TenantUserActions::edit($tenant),
                TenantUserActions::delete($tenant),
            ]);
    }
}