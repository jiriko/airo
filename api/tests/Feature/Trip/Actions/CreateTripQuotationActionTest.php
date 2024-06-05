<?php

use App\Trip\Actions\CreateTripQuotationAction;
use App\Trip\TransferObjects\CreateTripQuotationData;

it('calculates the quotation for a trip', closure: function () {
    $data = CreateTripQuotationData::from([
        'age' => '28,35',
        'currency_id' => 'EUR',
        'start_date' => '2020-10-01',
        'end_date' => '2020-10-30',
    ]);

    $quotation = resolve(CreateTripQuotationAction::class)->execute($data);

    expect($quotation->getdata())
        ->total->toEqual(117)
        ->currency_id->toBe('EUR')
        ->quotation_id->toBeString();
});
