<?php

declare(strict_types=1);

use App\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
});
