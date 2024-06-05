<?php

namespace App\Trip\Models;

use App\Trip\TransferObjects\TripQuotationData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;

/**
 * @mixin IdeHelperTripQuotation
 */
class TripQuotation extends Model
{
    use HasFactory, WithData;

    protected string $dataClass = TripQuotationData::class;
}
