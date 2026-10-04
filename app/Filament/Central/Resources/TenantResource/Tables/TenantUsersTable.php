<?php

namespace App\Filament\Central\Resources\TenantResource\Tables;

use App\Filament\Central\Resources\TenantResource\Actions\TenantUserActions;
use App\Models\Tenant;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TenantUsersTable
{
    public static function configure(Table $table, Tenant $tenant): Table
    {
        return $table
            ->query(
                $tenant->run(
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
                TenantUserActions::edit($tenant),
                TenantUserActions::delete($tenant),
            ]);
    }
}