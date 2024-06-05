<?php

declare(strict_types=1);

namespace App\Trip\Http\Controllers;

use App\Trip\Actions\CreateTripQuotationAction;
use App\Trip\TransferObjects\CreateTripQuotationData;
use App\Trip\TransferObjects\TripQuotationData;

class TripQuotationController
{
    public function store(CreateTripQuotationData $request, CreateTripQuotationAction $action): TripQuotationData
    {
        return $action->execute($request)->getData()
            ->except('total_cents')
            ->wrap('data');
    }
}
