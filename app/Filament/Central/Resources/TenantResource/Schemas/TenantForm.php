<?php

namespace App\Filament\Central\Resources\TenantResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TenantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->label(__('messages.tenant_id_slug'))
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('domain')
                    ->label('Subdomain')
                    ->required()
                    ->placeholder('e.g. tbilisi-hills'),
            ]);
    }
}
