<?php

namespace App\Filament\Resources\ApartmentResource\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\ApartmentResource;
use App\Filament\Resources\ApartmentResource\Actions\GenerateApartmentsAction;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ManageApartments extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = ApartmentResource::class;

    protected string $view = 'filament.resources.apartment-resource.pages.manage-apartments';

    public int $floor;

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->user()?->hasRole(
            UserRole::Chairman->value
        ) ?? false;
    }

    public function mount(int|string $floor): void
    {
        $this->floor = (int) $floor;
    }

    public function getHeading(): string
    {
        return __('messages.floor_number', [
            'floor' => $this->floor,
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ApartmentResource::getEloquentQuery()
                    ->where('floor', $this->floor)
                    ->orderBy('apartment_number')
            )
            ->columns([
                TextColumn::make('apartment_number')
                    ->label(__('messages.Apartment Number'))
                    ->numeric()
                    ->sortable(),
            ])
            ->recordActions([
                DeleteAction::make(),
            ])
            ->toolbarActions([]);
    }

    protected function getHeaderActions(): array
    {
        return [
            GenerateApartmentsAction::makeForFloor($this->floor),

            Action::make('back')
                ->label(__('messages.back'))
                ->icon('heroicon-o-arrow-left')
                ->url(
                    fn (): string => ApartmentResource::getUrl('index')
                ),
        ];
    }
}