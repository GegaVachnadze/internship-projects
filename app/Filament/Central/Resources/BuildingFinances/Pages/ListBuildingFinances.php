<?php

namespace App\Filament\Central\Resources\BuildingFinances\Pages;

use App\Filament\Central\Resources\BuildingFinances\BuildingFinanceResource;
use Filament\Resources\Pages\ListRecords;

class ListBuildingFinances extends ListRecords
{
    protected static string $resource = BuildingFinanceResource::class;
}