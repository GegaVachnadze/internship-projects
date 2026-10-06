<?php

namespace App\Filament\Resources\MonthlyFees\Pages;

use App\Filament\Resources\MonthlyFees\MonthlyFeeResource;
use App\Models\Apartment;
use App\Models\MonthlyFee;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateMonthlyFee extends CreateRecord
{
    protected static string $resource = MonthlyFeeResource::class;

    protected function handleRecordCreation(array $data): MonthlyFee
    {
        $apartments = Apartment::query()->get();

        if ($apartments->isEmpty()) {
            throw ValidationException::withMessages([
                'amount' => __('messages.no_apartments'),
            ]);
        }

        $existingFee = MonthlyFee::query()
            ->where('month', $data['month'])
            ->exists();

        if ($existingFee) {
            throw ValidationException::withMessages([
                'month' => __('messages.monthly_fee_already_exists'),
            ]);
        }

        foreach ($apartments as $apartment) {
            MonthlyFee::create([
                'apartment_id' => $apartment->id,
                'amount' => $data['amount'],
                'month' => $data['month'],
            ]);
        }

        return MonthlyFee::query()
            ->where('month', $data['month'])
            ->firstOrFail();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}