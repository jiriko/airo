<?php

declare(strict_types=1);

namespace App\Trip\TransferObjects;

use App\Common\Rules\Currency;
use App\Common\Rules\Delimited;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Data;

class CreateTripQuotationData extends Data
{
    public function __construct(
        #[Delimited('min:18|max:70|numeric')]
        public string $age,
        #[Currency]
        public string $currency_id,
        #[DateFormat('Y-m-d')]
        public Carbon $start_date,
        #[DateFormat('Y-m-d')]
        public Carbon $end_date
    ) {
    }
}
