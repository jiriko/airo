<?php

declare(strict_types=1);

use App\Trip\Http\Controllers\TripQuotationController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::name('tripQuotations.')->group(function () {
        Route::post('trip-quotations', [TripQuotationController::class, 'store'])
            ->name('store');
    });
});
