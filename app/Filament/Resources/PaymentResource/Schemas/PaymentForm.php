<?php

namespace App\Filament\Resources\PaymentResource\Schemas;

use App\Models\MonthlyFee;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('monthly_fee_id')
                    ->label(__('messages.Monthly Fee'))
                    ->options(
                        MonthlyFee::with('apartment')
                            ->get()
                            ->mapWithKeys(fn (MonthlyFee $fee): array => [
                                $fee->id => $fee->apartment->apartment_number . ' — ' . $fee->month,
                            ])
                    )
                    ->required()
                    ->searchable()
                    ->preload(),

                TextInput::make('amount')
                    ->label(__('messages.Amount'))
                    ->required()
                    ->numeric()
                    ->prefix('₾'),
            ]);
    }
}

