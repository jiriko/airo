<?php

namespace App\Trip\Actions;

use App\Trip\Models\TripQuotation;
use App\Trip\TransferObjects\CreateTripQuotationData;

class CreateTripQuotationAction
{
    private const DAILY_RATE = 3;

    private const LOAD_UNDER_31 = 60;

    private const LOAD_UNDER_41 = 70;

    private const LOAD_UNDER_51 = 80;

    private const LOAD_UNDER_61 = 90;

    private const LOAD_UNDER_71 = 100;

    public function execute(CreateTripQuotationData $data): TripQuotation
    {
        $ages = explode(',', $data->age);
        $days = $data->start_date->diffInDays($data->end_date) + 1;

        $total = collect($ages)
            ->map(fn ($age) => $this->calculateTrip((int) $age, (int) $days))
            ->sum();

        return TripQuotation::create([
            'currency_id' => $data->currency_id,
            'total_cents' => $total,
            'quotation_id' => uniqid(),
        ]);
    }

    /**
     * @throws \Exception
     */
    private function calculateTrip(int $age, int $days): float
    {
        $load = $this->ageLoad($age);

        return self::DAILY_RATE * $load * $days;
    }

    /**
     * @throws \Exception
     */
    private function ageLoad(int $age): float
    {
        if ($age < 31) {
            return self::LOAD_UNDER_31;
        }

        if ($age < 41) {
            return self::LOAD_UNDER_41;
        }

        if ($age < 51) {
            return self::LOAD_UNDER_51;
        }

        if ($age < 61) {
            return self::LOAD_UNDER_61;
        }

        if ($age < 71) {
            return self::LOAD_UNDER_71;
        }

        throw new \Exception('Age not supported');
    }
}
