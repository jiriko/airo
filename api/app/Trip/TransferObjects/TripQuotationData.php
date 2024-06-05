<?php

declare(strict_types=1);

namespace App\Trip\TransferObjects;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class TripQuotationData extends Data
{
    #[Computed]
    public float $total;

    public function __construct(
        public string $currency_id,
        public string $quotation_id,
        public Lazy|int $total_cents,
    ) {
        if (is_numeric($this->total_cents)) {
            $this->total = $this->total_cents / 100;
        } else {
            $this->total = 0;
        }
    }
}
