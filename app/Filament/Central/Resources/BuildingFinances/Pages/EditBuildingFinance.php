<?php

namespace App\Filament\Central\Resources\BuildingFinances\Pages;

use App\Filament\Central\Resources\BuildingFinances\BuildingFinanceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBuildingFinance extends EditRecord
{
    protected static string $resource = BuildingFinanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
